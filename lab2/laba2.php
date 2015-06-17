<?php
$myString1 = "Hello!";
echo "$myString1 <br />" ;
$myString2 = "This is some text written in a string variable";
echo "$myString2 <br />";
print 'This is exactly the same text <br />';
$myString3 = "My name is: ";
echo "$myString3 Lera <br />";
$myString4 = "I study";
$myString5 = $myString4." at BSUIR";
echo "$myString5 <br />";
$array[0] = "This is";
$array[1] = " array of strings";
echo($array[0]); echo ($array[1]); echo("<br>");
$var = 7;
echo " There are $var strings in this programm </br>";
$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;
if(abs($a-$b) > $epsilon) {
    echo "False </br>";
}
else {
    echo "True </br>";
}
$obj = (object) 'This is object </br>';
echo $obj->scalar;
class example
{
    function do_function()
    {
        echo "Doing function.";
    }
}
$bar = new example;
$bar->do_function();
