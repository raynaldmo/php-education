<?php
  $handle = fopen( "people.csv", "r" );

  echo '<table border="1" cellspacing="0" align="center" cellpadding="5">
   <tr><th>First Name</th><th>Last Name</th><th>Age</th></tr>';

  while ( $record = fgetcsv( $handle, 1000 ) ) {
    list($firstname, $lastname, $age) = $record;
    echo "<tr><td>$firstname</td><td>$lastname</td><td>$age</td></tr>";
  }

  echo '</table>';

  fclose( $handle );

?>