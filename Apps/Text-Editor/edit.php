<?php # edit.php
$page_title = 'Simple Text Editor';
include ('./includes/header.html');
include './includes/common.php';

//-------------------------- FUNCTIONS ------------------------------

// Edit given file
function editFile( $filename="" ) {

  if ( !$filename ) {
    redirect_user('index.php','?status_message="Invalid filename"');
  }

  // Security - ensure that files are in allowed directory
  $filename = basename($filename);
  $filepath = PATH_TO_FILES . "/$filename";

  if ( !file_exists( $filepath ) ) {
    redirect_user('index.php',
      http_build_query(
        array('status_message' => "Couldn't find file $filepath"))
    );
  }
  return array($filename, $filepath);
}

// Save given file to disk
function saveFile($file) {
  $filename = basename($file);
  $filepath = PATH_TO_FILES . "/$filename";

  if ( file_exists( $filepath ) ) {
    if ( file_put_contents( $filepath, $_POST["fileContents"] ) === false ) {
      redirect_user('index.php',
        http_build_query(
          array('status_message' => "Couldn't save file $filepath"))
        );
    }

  } else {
    redirect_user('index.php',
      http_build_query(
        array('status_message' => "Couldn't find file $filepath"))
    );
  }
  redirect_user();

}

// Create new file
function createFile($filename) {
  // For security reasons we strip file path and constrain
  // allowable file name
  $file = preg_replace( "/[^A-Za-z0-9_\- ]/", "", basename($filename) );

  if ( !$file ) {
    redirect_user('index.php',
      http_build_query(
        array('status_message' => "File $file name is invalid"))
    );
  }

  $file .= ".txt";
  $filepath = PATH_TO_FILES . "/$file";

  if ( file_exists( $filepath ) ) {
    redirect_user('index.php',
      http_build_query(
        array('status_message' => "$file already exists"))
    );
  } else {
    if ( file_put_contents( $filepath, "" ) === false ) {
      redirect_user('index.php',
        http_build_query(
          array('status_message' => "Couln't create file $file"))
      );
    }
    chmod( $filepath, 0666 );
  }

  return (array($file, $filepath));
}

//---------------------- END FUNCTIONS -------------------------------

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['filename'])) {
    list($filename,$filepath) = editFile($_GET['filename']);
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // If user hits cancel button, do nothing and return to home page
  if ( isset( $_POST["cancel"] ) ) {
    redirect_user();
  }

  if ( isset( $_POST["saveFile"] ) ) {
    saveFile($_POST["filename"]);
    // saveFile() will return us to home page after it's done
  }

  if ( isset( $_POST["createFile"]) && isset($_POST['filename']) ) {
    list($filename, $filepath) = createFile($_POST["filename"]);

    // createFile will either return us to home page or drop us into
    // edit page
  }
}

?>

  <h3>Editing <?php echo $filename ?></h3>
  <form action="edit.php" method="post">
    <div style="width: 40em;">
      <input type="hidden" name="filename" value="<?php echo htmlspecialchars( $filename ) ?>" />
      <textarea name="fileContents" id="fileContents" rows="20" cols="80" style="width: 100%;"><?php
        echo htmlspecialchars( file_get_contents( $filepath ) )
        ?></textarea>
      <div style="clear: both;">
        <input type="submit" name="saveFile" value="Save File" />
        <input type="submit" name="cancel" value="Cancel" style="margin-right: 20px;" />
      </div>
    </div>
  </form>

<?php
include ('./includes/footer.html');
?>