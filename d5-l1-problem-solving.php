<?php
/* 
i. Electric bill calculation (For first 50 units – 3.50 tk/unit For next 100 units – 4.00
tk/unit For next 100 units – 5.20 tk/unit For units above 250 – 6.50 tk/unit)
ii. A PHP calculator using switch case (Addition, Subtraction, Multiplication, Division)
iii. Check if a person is eligible to vote by age
iv. Check if a person is eligible for marriage in BD by gender.
v. Check if number is positive or negetive
vi. Check if number is odd or even vii. Check if data is integer or string 
*/

$use = 260;



if ($use <= 50) {
    $bill = $use * 3.50;
} elseif ($use <= 150) {
    $bill = (50 * 3.50) + (($use - 50) * 4.00);
} elseif ($use <= 250) {
    $bill = (50 * 3.50) + (100 * 4.00) + (($use - 150) * 5.20);
} else {
    $bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($use - 250) * 6.50);
}

echo "The total electric bill for $use units is: " . $bill . " Taka.";

echo "<br>";

$number1 = 10; // First number
$number2 = 5;  // Second number
$operation = "Multiplication";

switch ($operation) {
    case "Addition":
        $result = $number1 + $number2;
        break;
    case "Subtraction":
        $result = $number1 - $number2;
        break;
    case "Multiplication":
        $result = $number1 * $number2;
        break;
    case "Division":
        if ($number2 != 0) {
            $result = $number1 / $number2;
        } else {
            $result = "Error: Division by zero!";
        }
        break;
    default:
        $result = "Invalid operation!";
        break;
}

echo "The result of $number1 $operation $number2 is: $result";

echo "<br>";

$age = 18;

if ($age >= 18) {
    echo "The person is eligible to vote.";
} else {
    echo "The person is not eligible to vote.";
}

echo "<br>";

$gender = "Male";
$age = 21;

if ($gender == "Male") {
    if ($age >= 21) {
        echo "The person is eligible for marriage.";
    } else {
        echo "The person is not eligible for marriage.";
    }
} elseif ($gender == "Female") {
    if ($age >= 18) {
        echo "The person is eligible for marriage.";
    } else {
        echo "The person is not eligible for marriage.";
    }
} else {
    echo "Sorry we can't determine the eligibility.";
}

echo "<br>";

$number = 0;

if ($number > 0) {
    echo "The number is positive.";
} elseif ($number < 0) {
    echo "The number is negative.";
} else {
    echo "The number is zero.";
}

echo "<br>";

$number = 2; 

if ($number % 2 == 0) {
    echo "The number is even.";
} else {
    echo "The number is odd.";
}
