<?php
function num($x){
    return '<span style="color:green" >'.($x[0]).'</span>';
    return '<span style="underline">'.($x[0]).'</span>';
}
function rw($x){
    return '<span style="color:red">'.($x[0]).'</span>';
}
function ew($x){
    return '<span style="color:blue">'.($x[0]).'</span>';
}
$f=$_REQUEST["srcdir"];
if (is_file($f)) {
    $s=file_get_contents($f);
    $regExp["rw"] = '/(^|\s|\b)+[A-Z]+(^|\s|\b)/u';
    $regExp["ew"] = '/(^|\s|\b)+[A-Z][a-z]+/u';
    $regExp["num"] = '/\d+/';
    foreach ( $regExp as $key => $value ) {
        $s = preg_replace_callback($regExp[$key], $key,  $s);
    }
    echo($s);
}
else
    echo("Полученная ссылка не является файлом!");
