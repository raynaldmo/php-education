<?php
session_start();

if ( isset( $_POST["step"] ) and $_POST["step"] >= 1 and $_POST["step"] <= 3 ) {
  call_user_func( "processStep" . (int)$_POST["step"] );
} else {
  displayStep1();
}

function setValue( $fieldName ) {
  if ( isset( $_SESSION[$fieldName] ) ) {
    echo $_SESSION[$fieldName];
  }
}

function setChecked( $fieldName, $fieldValue ) {
  if ( isset( $_SESSION[$fieldName] ) and $_SESSION[$fieldName] == $fieldValue ) {
    echo ' checked="checked"';
  }
}

function setSelected( $fieldName, $fieldValue ) {
  if ( isset( $_SESSION[$fieldName] ) and $_SESSION[$fieldName] == $fieldValue ) {
    echo ' selected="selected"';
  }
}

function processStep1() {
  $_SESSION["firstName"] = $_POST["firstName"];
  $_SESSION["lastName"] = $_POST["lastName"];
  displayStep2();
}

function processStep2() {
  $_SESSION["gender"] = $_POST["gender"];
  $_SESSION["favoriteWidget"] = $_POST["favoriteWidget"];
  if ( isset( $_POST["submitButton"] ) and $_POST["submitButton"] == "< Back" ) {
    displayStep1();
  } else {
    displayStep3();
  }
}

function processStep3() {
  $_SESSION["newsletter"] = $_POST["newsletter"];
  $_SESSION["comments"] = $_POST["comments"];
  if ( isset( $_POST["submitButton"] ) and $_POST["submitButton"] == "< Back" ) {
    displayStep2();
  } else {
    displayThanks();
  }
}

function displayStep1() {
  displayPageHeader();
?>
    <h1>Member Signup: Step 1</h1>

    <form action="exercise2.php" method="post">
      <div style="width: 30em;">
        <input type="hidden" name="step" value="1" />

        <label for="firstName">First name</label>
        <input type="text" name="firstName" id="firstName" value="<?php setValue( "firstName" ) ?>" />

        <label for="lastName">Last name</label>
        <input type="text" name="lastName" id="lastName" value="<?php setValue( "lastName" ) ?>" />

        <div style="clear: both;">
          <input type="submit" name="submitButton" id="nextButton" value="Next &gt;" />
        </div>
      </div>
    </form>
<?php
}

function displayStep2() {
  displayPageHeader();
?>
    <h1>Member Signup: Step 2</h1>

    <form action="exercise2.php" method="post">
      <div style="width: 30em;">
        <input type="hidden" name="step" value="2" />

        <label>Your gender:</label>
        <label for="genderMale">Male</label>
        <input type="radio" name="gender" id="genderMale" value="M"<?php setChecked( "gender", "M" )?>/>
        <label for="genderFemale">Female</label>
        <input type="radio" name="gender" id="genderFemale" value="F"<?php setChecked( "gender", "F" )?> />

        <label for="favoriteWidget">What's your favorite widget? *</label>
        <select name="favoriteWidget" id="favoriteWidget" size="1">
          <option value="superWidget"<?php setSelected( "favoriteWidget", "superWidget" ) ?>>The SuperWidget</option>
          <option value="megaWidget"<?php setSelected( "favoriteWidget", "megaWidget" ) ?>>The MegaWidget</option>
          <option value="wonderWidget"<?php setSelected( "favoriteWidget", "wonderWidget" ) ?>>The WonderWidget</option>
        </select>

        <div style="clear: both;">
          <input type="submit" name="submitButton" id="nextButton" value="Next &gt;" />
          <input type="submit" name="submitButton" id="backButton" value="&lt; Back" style="margin-right: 20px;" />
        </div>
      </div>
    </form>
<?php
}

function displayStep3() {
  displayPageHeader();
?>
    <h1>Member Signup: Step 3</h1>

    <form action="exercise2.php" method="post">
      <div style="width: 30em;">
        <input type="hidden" name="step" value="3" />

        <label for="newsletter">Do you want to receive our newsletter?</label>
        <input type="checkbox" name="newsletter" id="newsletter" value="yes"<?php setChecked( "newsletter", "yes" )?> />

        <label for="comments">Any comments?</label>
        <textarea name="comments" id="comments" rows="4" cols="50"><?php setValue( "comments" ) ?></textarea>

        <div style="clear: both;">
          <input type="submit" name="submitButton" id="nextButton" value="Next &gt;" />
          <input type="submit" name="submitButton" id="backButton" value="&lt; Back" style="margin-right: 20px;" />
        </div>
      </div>
    </form>
<?php
}

function displayThanks() {
  $_SESSION = array();
  displayPageHeader();
?>
    <h1>Thank You</h1>
    <p>Thank you, your application has been received.</p>
<?php
}

function displayPageHeader() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Membership Form</title>
    <link rel="stylesheet" type="text/css" href="common.css" />
  </head>
  <body>
<?php
}
?>

  </body>
</html>
