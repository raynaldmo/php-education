<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/5/15
 * Time: 8:01 PM
 */

if ($_POST) {
  echo '<pre>';
  echo htmlspecialchars(print_r($_POST, true));
  echo '</pre>';
}

?>
<form action="" method="post">
  Name:  <input type="text" name="personal[name]" /><br /><br>
  Email: <input type="text" name="personal[email]" /><br /><br>
  <input type="radio" name="sex" value="male">Male<br>
  <input type="radio" name="sex" value="female">Female<br><br>
  Beer: <br />
  <br>
  <select multiple name="beer[]">
    <option value="warthog">Warthog</option>
    <option value="guinness">Guinness</option>
    <option value="stuttgarter">Stuttgarter Schwabenbräu</option>
  </select><br />
  <br>
  <input type="submit" value="submit me!" />
</form>