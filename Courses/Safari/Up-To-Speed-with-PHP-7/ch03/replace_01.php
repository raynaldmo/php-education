<?php
$list = <<< END
<p class=ListParaFirst><span
style='font-family:Symbol;'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>APPLES</p>
  <p class=ListParaMiddle><span
style='font-family:Symbol;'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>BANANAS</p>
  <p class=ListParaMiddle><span
style='font-family:Symbol;'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>ORANGES</p>
  <p class=ListParaLast><span
style='font-family:Symbol;'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>PEARS</p>
END;


$list = preg_replace(
    array(
        '{<p class=ListParaFirst[\s\S]*?</span></span>(\w+)</p>}m',
        '{<p class=ListParaMiddle[\s\S]*?</span></span>(\w+)</p>}m',
        '{<p class=ListParaLast[\s\S]*?</span></span>(\w+)</p>}m'
    ),
    array(
        '<ul>' . PHP_EOL . "<li>$1</li>",
        "<li>$1</li>",
        "<li>$1</li>" . PHP_EOL . '</ul>'
    ),
    $list
);
echo $list;