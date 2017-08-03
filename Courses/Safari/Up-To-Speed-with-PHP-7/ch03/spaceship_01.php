<?php
$a = 5;
$b = $c = 9;
echo '$a = 5, $b and $c = 9 <br>';
echo '$a &lt;=&gt; $b returns ' . ($a <=> $b) . '<br>';
echo '$b &lt;=&gt; $c returns ' . ($b <=> $c) . '<br>';
echo '$c &lt;=&gt; $a returns ' . ($c <=> $a);
