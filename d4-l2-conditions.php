<?php
// if..else
$x = 10;

if ($x < 5) {
    echo "Shorto puron hoyeche";
} else {
    echo "Shorto puron hoy nai";
}

echo "<br>";
// elseif

$age = 19.5;

if ($age <= 12 && $age > 0) {
    echo "You are a baby";
} elseif ($age <= 19 && $age > 12) {
    echo "You are a teenager";
} elseif ($age <= 29 && $age > 19) {
    echo "You are a young person";
} elseif ($age <= 49 && $age > 29) {
    echo "You are a middle aged person";
} elseif ($age < 130 && $age > 49) {
    echo "You are an old person";
} else {
    echo "You are not a human";
}

echo "<br>";
// switch

switch ($age) {
    case ($age <= 12 && $age > 0):
        echo "You are a baby";
        break;
    case ($age <= 19 && $age > 12):
        echo "You are a teenager";
        break;
    case ($age <= 29 && $age > 19):
        echo "You are a young person";
        break;
    case ($age <= 49 && $age > 29):
        echo "You are a middle aged person";
        break;
    case ($age < 130 && $age > 49):
        echo "You are an old person";
        break;
    default:
        echo "You are not a human";
}

// ternary operator
echo "<br>";

$myAge = 10;
/* 
if ($y < 5) {
    echo "Shorto puron hoyeche";
} else {
    echo "Shorto puron hoy nai";
} 
*/

echo $myAge > 5 ? "Shorto puron hoyeche" : "Shorto puron hoy nai";


// null safe

echo "<br>";

// echo $cmbd;

/*
if (isset($cmbd)) {
    echo $cmbd;
} else {
    echo "cmbd is not set";
}
*/

echo $cmbd ?? "cmbd is not set";
