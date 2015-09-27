<?php # index.php
$page_title = 'Simple Text Editor';
include ('./includes/header.html');
include './includes/common.php';

//-------------------------- FUNCTIONS ------------------------------

function displayFileList( $message="" ) {

  if ( !file_exists( PATH_TO_FILES ) ) die( "Directory not found" );
  if ( !( $dir = dir( PATH_TO_FILES ) ) ) die( "Can't open directory" );

  if ( $message ) {
    echo '<div class="status-line" style="display:block";>' .
      '<span class="error" >' .
      $message .
      '</span><span class="error-cancel">&otimes;</span></div>';
  }

  // Display file list header
  echo '<h2>Choose a file to edit:</h2>
  <table cellspacing="0" border="0" style="width: 40em; border: 1px solid #666;">
    <tr>
      <th>Filename</th>
      <th>Size (bytes)</th>
      <th>Last Modified</th>
    </tr>';

  // Display file list. For each file found, create edit link to it
  while ( $filename = $dir->read() ) {
    $filepath = PATH_TO_FILES . "/$filename";
    if ( $filename != "." && $filename != ".." &&
      !is_dir( $filepath ) && strrchr( $filename, "." ) == ".txt" ) {
      echo '<tr><td><a href="edit.php?filename=' . urlencode( $filename ) .
        '">' . $filename . '</a></td>';
      echo '<td>' . filesize( $filepath ) . '</td>';
      echo '<td>' . date( "M j, Y H:i:s", filemtime( $filepath ) ) . '</td></tr>';
    }
  }

  $dir->close();

  echo '</table>';

}

//---------------------- END FUNCTIONS -------------------------------

$status_message = '';

if (isset($_GET['status_message'])) {
  $status_message = $_GET['status_message'];
}

displayFileList($status_message);

?>
  <h3>...or create a new file:</h3>
  <form action="edit.php" method="post">
    <div style="width: 30em;">
      <label for="filename">Filename</label>
      <input type="text" name="filename" id="filename"
             style="width: 50%;" value="" /><span>&nbsp;.txt</span>
       <input type="submit" name="createFile" value="Create File" />
    </div>
  </form>

<?php
  include ('./includes/footer.html');
?>