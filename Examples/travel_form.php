<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset=utf-8>
  <title>Travel Reservation</title>
  <style type="text/css">
    h1 {margin-bottom:20px}
    form{margin-left:100px}
    input, label {margin-top:7px; margin-bottom:7px; color:#000066; font-size: 18px; padding-right: 7px}
    input[type='checkbox'] {margin-left: 5px}
    label {display: block;}
    .note { color: red;}
    .btn {
      color: white;
      background-color: royalblue;
      margin-top: 10px;
      height: 50px;
      width: 200px;
      font-size: 1em;
    }
  </style>
</head>
<!-- This a PHP form example from w3resource that seesm to be broken ! -->
<body>
<?
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check if submit key exists - if we haven't submitted
    // the form it won't exist
    if (isset($_POST['submit'])) {
      //check that name text box is not empty
      if(empty($_POST['full_name'])) {
        $msg_name = "You must supply your name";
      } else {
        $name_subject = $_POST['full_name'];
        $name_pattern = '/^[a-zA-Z ]*$/';
        preg_match($name_pattern, $name_subject, $name_matches);
        if(!$name_matches[0]) {
          $msg2_name = "Only alphabets and white space allowed";
        }
      }
    }
  }

?>
<div class="row">
  <div class="span12">
    <h1>Travel Reservation</h1>
    <form id="registration_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div>
        <p><span class="note">*</span> denotes mandatory field</p>
        <label>Full name<span class="note">*</span>:</label>
        <input type="text" name="full_name" placeholder="FirstName LastName" autofocus="autofocus">
        <? echo "<p class='note'>".$msg_name."</p>";?>
      </div>

      <div>
        <label>Email address<span class="note">*</span>:</label>
        <input type="text" name="email_addr">
      </div>

      <div>
        <label>Select Tour Package<span class="note">*</span>:</label>
        <select name="package">
          <option value="Goa">Goa</option>
          <option value="Kashmir">Kashmir</option>
          <option value="Rajasthan">Rajasthan</option>
        </select>
      </div>
      <div>
        <label>Arrival date<span class="note">*</span>:</label>
        <input type="text" name="arv_dt" placeholder="m/d/y">
      </div>
      <div>
        <label>Number of persons<span class="note">*</span>:</label>
        <input type="text" name="persons">
      </div>

      <div>
        <label>What would you want to avail?<span class="note">*</span></label>
        Boarding<input type="checkbox" name="facilities[]" value="boarding">
        Fooding<input type="checkbox" name="facilities[]" value="fooding">
        Sight seeing<input type="checkbox" name="facilities[]" value="sightseeing">
      </div>

      <div>
        <label>Discout Coupon code:</label>
        <input type="text" name="dis_code">
      </div>
      <div>
        <label>Terms and conditions<span class="note">*</span></label>
        <input type="radio" name="tnc" value="agree" checked="checked">I
        agree<br>
        <input type="radio" name="tnc" value="disagree">I disagree<br>
      </div>
      <div>
        <button type="submit" class="btn btn-large btn-primary"
                name="submit">Complete Reservation</button>
      </div>

    </form>
  </div>
</div>
<body>
</html>
