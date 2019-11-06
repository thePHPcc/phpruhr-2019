<?php

$a = 12;
$result = divide($a, 4);
var_dump($a);

function divide($a, $b)
{
    $a++;
    var_dump($a);

    return $a / $b;
}
