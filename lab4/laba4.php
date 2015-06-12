<?php

function num($x)
{
    return '<span style="color:green" >'.($x[0]).'</span>';
    return '<span style="underline">'.($x[0]).'</span>';
}

function rw($x)
{
    return '<span style="color:red">'.($x[0]).'</span>';
}

function ew($x)
{
    return '<span style="color:blue">'.($x[0]).'</span>';
}

$f=$_REQUEST["srcdir"];

if (is_file($f))
{
    $s=file_get_contents($f);
    $s = preg_replace_callback('/(^|\s|\b)+[A-Z]+(^|\s|\b)/u', 'rw', $s);
    $s = preg_replace_callback('/(^|\s|\b)+[A-Z][a-z]+/u', 'ew', $s);
    $s = preg_replace_callback('/\d+/', 'num', $s);
    echo($s);
}
else
    echo("Полученная ссылка не является файлом!");

?>