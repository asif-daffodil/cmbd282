<?php
/* 
 * i. Find maximum number from an array
 * ii. Find 2nd max number from an array
 * iii. Sort array from min to max
 * iv. Calculate average number of an array
 * v. Merging 2 different types of array together
 * vi. Search data from an array
 * vii. Show array data in lowercase and uppercase
 * viii. Get unique values
 * ix. Remove duplicate values
 * x. Check if email address is unique
 * xi. Check unique username
 * xii. Merge 2 comma separated lists with unique value only
 * xiii. Difference between 2 multi-dimensional arrays
 * xiv. Check if all values are string or not
 * xv. Union of 2 arrays
 * xvi. Filter out array data with some specific keys
 * xvii.Filter a multi-dimensional array.
 * xviii. Remove all white spaces from an array
 * xix. Combine 2 array and use one array data as keys and others as values
 * xx. Convert string to array 
*/

// i. Find maximum number from an array
$myArr =[3, 5, 1, 20, 45, 93, 86, 74, 12, 9];
echo max($myArr)."<br>";

// ii. Find 2nd max number from an array
rsort($myArr);
echo $myArr[1]."<br>";

// iii. Sort array from min to max
sort($myArr);
echo "<pre>";
print_r($myArr);
echo "</pre>";

// iv. Calculate average number of an array
echo array_sum($myArr)/count(value: $myArr)."<br>";

// v. Merging 2 different types of array together
$myArr = [1, 2, 3, 4, 5];
$myArr2 = ["a", "b", "c", "d", "e"];
$mergedArr = array_merge($myArr, $myArr2);
echo "<pre>";
print_r($mergedArr);
echo "</pre>";

// vi. Search data from an array
$index = array_search(3, $myArr);
echo $index."<br>";

// vii. Show array data in lowercase and uppercase
$myArr = ["a", "b", "c", "d", "e"];
$lowerArr = array_map("strtolower", $myArr);
$upperArr = array_map("strtoupper", $myArr);
echo "<pre>";
print_r($lowerArr);
print_r($upperArr);
echo "</pre>";

// viii. Get unique values
$myArr = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];
$uniqueArr = array_unique($myArr);
echo "<pre>";
print_r($uniqueArr);
echo "</pre>";

// ix. Remove duplicate values
$myArr = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];
$uniqueArr = array_unique($myArr);
echo "<pre>";
print_r($uniqueArr);
echo "</pre>";

// x. Check if email address is unique
$email = "kaka@chacha.com";
$myArr = ["abul@babul.com", "vuya@mua.com", "hello@world.com"];
if(in_array($email, $myArr)){
    echo "Email already exists";
}else{
    echo "Email is unique";
}
echo "<br>";

// xi. Check unique username
$username = "kaka";
$myArr = ["abul", "vuya", "hello"];
if(in_array($username, $myArr)){
    echo "Username already exists";
}else{
    echo "Username is unique";
}

echo "<br>";

// xii. Merge 2 comma separated lists with unique value only
$myArr = "1, 2, 3, 4, 5";
$myArr2 = "3, 4, 5, 6, 7";
$myArr = explode(", ", $myArr);
$myArr2 = explode(", ", $myArr2);
$mergedArr = array_merge($myArr, $myArr2);
$uniqueArr = array_unique($mergedArr);
echo "<pre>";
print_r($uniqueArr);
echo "</pre>";

// xiii. Difference between 2 multi-dimensional arrays
$myArr = [
    ["name" => "abul", "age" => 20],
    ["name" => "babul", "age" => 25],
    ["name" => "kabul", "age" => 30]
];

$myArr2 = [
    ["name" => "abul", "age" => 20],
    ["name" => "babul", "age" => 25],
    ["name" => "kabul", "age" => 30],
    ["name" => "sabul", "age" => 35]
];

// Serialize the sub-arrays
$serializedArr = array_map('serialize', $myArr);
$serializedArr2 = array_map('serialize', $myArr2);

echo "<pre>";
print_r($serializedArr);
print_r($serializedArr2);
echo "</pre>";

// Perform array_diff on serialized arrays
$diff = array_diff($serializedArr2, $serializedArr);

// Unserialize the differences
$diffArr = array_map('unserialize', $diff);

echo "<pre>";
print_r($diffArr);
echo "</pre>";

// xiv. Check if all values are string or not
$myArr = ["abul", "babul", "kabul"];
function checkString($val){
    foreach($val as $v){
        if(!is_string($v)){
            return "Not all values are string";
        }
    }
    return "All values are string";
}
echo checkString($myArr);

// xv. Union of 2 arrays
$myArr = [1, 2, 3, 4, 5];
$myArr2 = [3, 4, 5, 6, 7];
$unionArr = array_unique(array_merge($myArr, $myArr2));
echo "<pre>";
print_r($unionArr);
echo "</pre>";

// xvi. Filter out array data with some specific keys
$myArr = [
    ["name" => "abul", "age" => 20],
    ["name" => "babul", "age" => 25],
    ["name" => "kabul", "age" => 30]
];

$filteredArr = array_map(function($val){
    return ["age" => $val["age"]];
}, $myArr);

echo "<pre>";
print_r($filteredArr);
echo "</pre>";

// xvii.Filter a multi-dimensional array.
$myArr = [
    ["name" => "abul", "age" => 20],
    ["name" => "babul", "age" => 25],
    ["name" => "kabul", "age" => 30]
];

$filteredArr = array_filter($myArr, function($val){
    return $val["age"] > 20;
});

echo "<pre>";
print_r($filteredArr);
echo "</pre>";

// xviii. Remove all white spaces from an array
$myArr = ["abul", " babul", "kabul "];
$myArr = array_map("trim", $myArr);

echo "<pre>";
print_r($myArr);
echo "</pre>";

// xix. Combine 2 array and use one array data as keys and others as values
$myArr = ["name", "age", "city"];
$myArr2 = ["abul", 20, "Dhaka"];
$combinedArr = array_combine($myArr, $myArr2);
echo "<pre>";
print_r($combinedArr);
echo "</pre>";

// xx. Convert string to array
$string = "abul, babul, kabul";
$myArr = explode(", ", $string);
echo "<pre>";
print_r($myArr);
echo "</pre>";
?>