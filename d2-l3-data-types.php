<?php
// Stings
$myCityName = "Dhaka";
var_dump($myCityName);
echo "<br>";

// Integers
$myAge = 25;
var_dump($myAge);
echo "<br>";

// Floats
$myHeight = 5.8;
var_dump($myHeight);
echo "<br>";

// Booleans
$myStatus = true;
var_dump($myStatus);
echo "<br>";

// Null
$myNull = null;
var_dump($myNull);
echo "<br>";

// Arrays
$myCityNames = ["Dhaka", "Chittagong", "Sylhet"];
var_dump($myCityNames);
echo "<br>";

// Objects
class myClass
{
    public $myProperty = "This is a property";
}
$myObject = new myClass();
var_dump($myObject);
echo "<br>";

// Resources
$myFile = fopen("d2-l3-data-types.php", "r");
var_dump($myFile);
echo "<br>";
