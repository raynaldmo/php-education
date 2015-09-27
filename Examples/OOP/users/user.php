<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Example User Class</title>
  </head>
  <body>
    <h3>Example User Class</h3>
    <?php
      require 'User.php';

    $user1 = new User();
    $user1->printUserInfo();

    $user2 = new User('bucky','bucky@hotmail.com');
    $user2->printUserInfo();

    ?>
  </body>
</html>

