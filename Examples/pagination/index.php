<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Number squaring</title>
    <link rel="stylesheet" type="text/css" href="common.css" />
    <style type="text/css">
      th { text-align: left; background-color: #999; }
      th, td { padding: 0.4em; }
      tr:nth-child(even){ background: #ddd; }
    </style>
  </head>
  <body>

<?php

define( "PAGE_SIZE", 10 );
$start = 0;

if ( isset( $_GET["start"] ) and $_GET["start"] >= 0 and $_GET["start"] <= 1000000 ) {
  $start = (int) $_GET["start"];
}

$end = $start + PAGE_SIZE - 1;

?>
    <h3><?php $page=($start/PAGE_SIZE) + 1;echo "Number squaring - Page
    $page";
      ?></h3>

    <p>Displaying the squares of the numbers <?php echo $start ?> to <?php echo $end ?>:</p>

    <table cellspacing="0" border="0" style="width: 20em; border: 1px solid #666;">
      <tr>
        <th>n</th>
        <th>n<sup>2</sup></th>
      </tr>
<?php
for ( $i=$start; $i <= $end; $i++ ):
?>
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo pow( $i, 2 )?></td>
      </tr>
<?php
endfor;
?>
    </table>

    <p>
<?php if ( $start > 0 ) : ?>
      <a href="index.php?start=0">&lt;First
        Page</a> |
      <a href="index.php?start=<?php echo $start - PAGE_SIZE ?>">&lt;Previous
        Page</a> |
<?php endif; ?>
      <a href="index.php?start=<?php echo $start + PAGE_SIZE ?>">Next Page &gt;
      </a>
    </p>

  </body>
</html>
