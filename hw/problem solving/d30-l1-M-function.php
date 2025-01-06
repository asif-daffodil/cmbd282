<!-- 1. Solve the problems: -->

<?php
function calculate_bill($units) {
    $unit_cost_first = 3.50;
    $unit_cost_second = 4.00;
    $unit_cost_third = 5.20;
    $unit_cost_fourth = 6.50;

    if($units <= 50) {
        $bill = $units * $unit_cost_first;
    }
    else if($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    }
    else if($units > 100 && $units <= 200) {
        $temp = (50 * 3.5) + (100 * $unit_cost_second);
        $remaining_units = $units - 150;
        $bill = $temp + ($remaining_units * $unit_cost_third);
    }
    else {
        $temp = (50 * 3.5) + (100 * $unit_cost_second) + (100 * $unit_cost_third);
        $remaining_units = $units - 250;
        $bill = $temp + ($remaining_units * $unit_cost_fourth);
    }
    return number_format((float)$bill, 2, '.', '');
}


 //2. Solve the problems : 
 //Addition 

$x= 10;
$y= 11;
$c= $x + $y;
echo $c;
echo "<br>";
echo "<br>";

// Subtraction:
$x= 10;
$y= 11;
$a = $x-$y;
echo $a;
echo "<br>";
echo "<br>";

//Multiplication:
$z = $x*$y;
echo $z;
echo "<br>";
echo "<br>";

//Division:
$x= 10;
$y= 11;
$d = $y / $x;
echo $d;
echo "<br>";
echo "<br>";

// 3. Solve the problems :

$age = 10;

if ($age <= 17 && $age> 0){
    echo "You are not a voter.";
}elseif($age<130 && $age>17) {
    echo "You are  a voter."; 
}else{
    echo "You are not a human";
}
echo "<br>";
echo "<br>";
//4. Check if a person is eligible for marriage in BD by gender.

//Gender: male;
$maleAge = 18;

if ( $maleAge < 21) {
    echo "He is not eligible for marriage.";
}else {
    echo "He is eligible for marriage.";
}
echo "<br>";
echo "<br>";

//Gender: Female;
$femaleAge = 19;

if ( $femaleAge < 18) {
    echo "He is not eligible for marriage.";
}else {
    echo "He is eligible for marriage.";
}
echo "<br>";
echo "<br>";



//5.Check if number is positive or negetive:
$number =200;

if($number>0){
    echo "$number . is a positive number";
}else if ($number==0){
    echo "You have entered zero";
}else {
    echo "$number . is a negetive number";
}
echo "<br>";
echo "<br>";
    
//6.  Check if number is odd or even:

$number = 100;
 
if($number % 2 ==0){
    echo "$number . is a even number.";
}else{
    echo "$number . is a odd number";
}  
echo "<br>";
echo "<br>";

//7. . Check if data is integer or string:
$myCityName = "Dhaka";
var_dump ($myCityName);
echo "<br>";

$myCountryName = "Bangladesh";
var_dump ($myCountryName);
echo "<br>";

$height = 5;
var_dump($height);
echo "<br>";

$roll = 62;
var_dump($roll);
echo "<br>";
