
<?php
/*i. Electric bill calculation (For first 50 units – 3.50 tk/unit For next 100 units – 4.00
tk/unit For next 100 units – 5.20 tk/unit For units above 250 – 6.50 tk/unit)*/
$units = 280;
$total_bill = 0;

if ($units <= 50) {
    $total_bill = $units * 3.50;
} elseif ($units <= 150) {
    $total_bill = (50 * 3.50) + (($units - 50) * 4.00);
} elseif ($units <= 250) {
    $total_bill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
} else {
    $total_bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
}

echo "The total electric bill for $units units is: " . $total_bill . " Taka.";

echo "<br>";

//ii. A PHP calculator using switch case (Addition, Subtraction, Multiplication, Division)
$number1 = 10; // First number
$number2 = 5;  // Second number
$operation = "Addition"; // Operation (can be +, -, *, /)

$result = 0;

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

//iii. Check if a person is eligible to vote by age
$age = 18;

if ($age >= 18) {
    echo "The person is eligible to vote.";
} else {
    echo "The person is not eligible to vote.";
}

echo "<br>";


// iv. Check if a person is eligible for marriage in BD by gender.
$age = 22;
$gender = "female";


$legal_age_male = 21; //  legal marriage age for males and females in Bangladesh
$legal_age_female = 18;

if ($gender == "male") {
    if ($age >= $legal_age_male) {
        echo "The male person is eligible for marriage.";
    } else {
        echo "The male person is not eligible for marriage.";
    }
} elseif ($gender == "female") {
    if ($age >= $legal_age_female) {
        echo "The female person is eligible for marriage.";
    } else {
        echo "The female person is not eligible for marriage.";
    }
} else {
    echo "Invalid gender input.";
}

echo "<br>";

//v. Check if number is positive or negative
$number = 5;

if ($number > 0) {
    echo "The number $number is positive.";
} elseif ($number < 0) {
    echo "The number $number is negative.";
} else {
    echo "The number is zero.";
}

echo "<br>";

//vi.Check if the number is odd or even
$number = 6;

if ($number % 2 == 0) {
    echo "The number $number is even.";
} else {
    echo "The number $number is odd.";
}

echo "<br>";

//vii.Check if the data is an integer or a string

$data = "test";

if (is_int($data)) {
    echo "The data is an integer.";
} elseif (is_string($data)) {
    echo "The data is a string.";
} else {
    echo "The data is neither an integer nor a string.";
}
?>


