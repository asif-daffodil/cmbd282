<?php 
// i.
// Find maximum number from an array
$number1 = [1, 4, 5, 9, 8, 70, 6, 5, 4, 30, 52, 60, 50];
$maxNum = max($number1);
echo "max number is~ ", $maxNum;



echo "<br>";
echo "<br>";
echo "<br>";



// iii. Sort array from min to max
$number1 = array(1,12,3,4,25,6,37,8,19,16,19,22,53);
$arraySort = sort($number1);
echo "<pre>" . "Sort array number min to max in ~ ";
print_r(  $number1);
echo "</pre>";



echo "<br>";
echo "<br>";
echo "<br>";



// iv. Calculate average number of an array
$number2 = [1,12,3,4,25,6,37,8,19,16,19,22,53];

echo "average number of an ~ ". "<br>". "<br>";
if (count($number2) > 0){
    $sum = array_sum($number2);
    $count = count($number2);
    $avarage = $sum / $count;
} echo "the avarage num is~ ". $avarage;



echo "<br>";
echo "<br>";
echo "<br>";



// v. Merging 2 different types of array together
$number3 = array("Imran", "Dubai", 72, 5.12, true, "Deira");
$number4 = array("Razib", "Dhaka", 83, 5.11, true, "Uttara");

$finalmerge = array_merge($number3, $number4);
echo "<pre>". "merge 2 array in together ~ ";
print_r($finalmerge);
echo "</pre>";



echo "<br>";
echo "<br>";
echo "<br>";



// vi. Search data from an array
$number5 = array(103,12,3,4,49,85,6,37,78,19,66,19,22,53);
$search_index = array_search(85, $number5);
echo "Search data from an array". "<br>". "<br>";
echo "number is~ " .$search_index;



echo "<br>";
echo "<br>";
echo "<br>";



// vii. Show array data in lowercase and uppercase

$number6 = ["php", "is", "most", "important", "language", "in", "the", "worlds"];

$lowerCase = array_map('strtolower', $number6);
$upperCase = array_map('strtoupper', $number6);

echo "<pre>" . "LowerCase Words ~ " ;
print_r($lowerCase);
echo "</pre>";

echo "<br>";

echo "<pre>" . "UpperCase Words ~ ";
print_r($upperCase);
echo "</pre>";



echo "<br>";
echo "<br>";
echo "<br>";



// viii. Get unique values
$number7 = array(1,32,3,14,57,91,17,2,92,3,3,4,4,3,23) ;
$arrayUnique = array_unique($number7);
echo "<pre>". "Get unique values";
print_r($arrayUnique);
echo "</pre>";



echo "<br>";
echo "<br>";
echo "<br>";



// ix. Remove duplicate values
$number8 = [6, 4, 52, 9, 8, 70, 60, 5, 4, 30, 52, 60, 50, 9];
$uniqueNumber = array_unique($number8);
echo "<pre>". "Remove duplicate values";
print_r($uniqueNumber);
echo "</pre>";



echo "<br>";
echo "<br>";
echo "<br>";



// x. Check if email address is unique
$myEmails = [
    "imran2025@gmail.com",
    "rahim2065@gmail.com",
    "razib2015@gmail.com",
    "mamun2065@gmail.com",
    "jonu2035@gmail.com",
];
$enterEmail = "imran025@gmail.com";

echo "Check if email address is unique:". "<br>". "<br>";

if (in_array($enterEmail, $myEmails)) {
 echo "this email '$enterEmail' already used";
} else {
    echo "this email '$enterEmail' is unique";
}



echo "<br>";
echo "<br>";
echo "<br>";



// xi. Check unique username
$userName = [
    "nurislam_imran",
    "imran_2025",
    "imran128268",
    "1025imran",
    "admin123",
];
$enterUser = "nurislam_imrans";

echo "Check unique username:". "<br>". "<br>";

if (in_array($enterUser, $userName)) {
 echo "this user '$enterUser' already used";
} else {
    echo "this user '$enterUser' is unique";
}



echo "<br>";
echo "<br>";
echo "<br>";



// xiii. Difference between 2 multi-dimensional arrays
$Myarray1 = array(1,12,3,4,25,6,37,8,19,16,19,22,53);
$Myarray2 = array(103,12,3,4,85,6,37,78,19,66,19,22,53);

$myDiff = array_diff($Myarray1, $Myarray2);
echo "<pre>" . "Difference between 2 multi-dimensional arrays";
print_r( $myDiff);
echo "</pre>";




echo "<br>";
echo "<br>";
echo "<br>";



// xiv. Check if all values are string or not
$allValue = [7585,"Bangladesh", "BPL", "Winter-Season", 2025, true, null,];
$valResult = ($allValue);
echo "Check if all values are string or not". "<br>" ."<br>";
echo $valResult ? "all value is string" : "all value is not string";




echo "<br>";
echo "<br>";
echo "<br>";




// xv. Union of 2 arrays
$number9 = [12,21,23,34,5,1,4,4,56,87,6,9,0,5,4,3,23] ;
$number10 = [12,21,23,34,5,1,4,4,56,87,6,9,0,5,4,3,23] ;
$number11 = array_merge($number9, $number10);
$arrayUnique = array_unique($number11);
echo "<pre>"."Union of 2 ";
print_r($arrayUnique);
echo "</pre>";




echo "<br>";
echo "<br>";
echo "<br>";




// xvi. Filter out array data with some specific keys
$myInfo = [
    "name" => "Imran",
    "City" => "Dhaka",
    "Height"=> "5.11",
    "weight"=> "72",
    "Status"=> "Single",
    "Country"=> "Bangladesh",
];

$myKeys = array_keys($myInfo);
echo "<pre>". "Filter out array data with some specific keys";
print_r($myKeys);
echo "</pre>";




echo "<br>";
echo "<br>";
echo "<br>";




// xvii.Filter a multi-dimensional array.
$myFriends = [
    ["Imran", "Feni", "Bangladesh", true , 2025, "Final"],
    ["Razib", "Dhaka", "Dubai", true , 2021, "BPL"],
    ["Joni", "DXB", "malaysia", true , 2020, "Biman"],
    ["Arif", "Sylhet", "KSA", true , 2015, "Jecket"],
    ["Raju", "Keyna", "Oman", true , 2022, "Pen"]
];
echo "<pre>". "Filter a multi-dimensional ";
print_r($myFriends[0]);
echo "</pre>";



echo "<br>";
echo "<br>";
echo "<br>";




// xix. Combine 2 array and use one array data as keys and others as values
$val1 = ["My Name","My Age","My Height","Blood Group","My City",];
$val2 = ["Imran","27","5.11","O-","Dhaka"];

$valCombine = array_combine($val1, $val2);
echo "<pre>". "Combine 2 ";
print_r($valCombine);
echo "</pre>";




echo "<br>";
echo "<br>";
echo "<br>";



// xx. Convert string to array

$inString = " Strawberry, Promeganate, Pear, Mango, Olive, Fig, Carambola, Apple, Custard-Apple";

$inArray = explode(",", $inString);
echo "<pre>". "Convert string to ";
print_r($inArray);
echo "</pre>";


?>