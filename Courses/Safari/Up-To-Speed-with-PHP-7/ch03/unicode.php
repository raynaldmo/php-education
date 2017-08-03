<?php
// Four-digit codepoints
echo "<p>Caf\u{00e9} Royal</p>";

//$tel = "\u{260E}";

//echo "<p>$tel (212) 555-0199</p>";

// Five-digit codepoint
//echo "<p>PHP 7 has spaceships! \u{1F680}</p>";

// Leading zeros omitted
//echo "<p>Caf\u{e9} Royal</p>";

// JSON not affected
//echo json_decode("\"\u00e9\"");