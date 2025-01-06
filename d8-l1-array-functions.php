<?php  
// array()
$myArr = array("Asif", "Dhaka", 70, true, 5.8, null, "Bd");

// is_array()
echo is_array($myArr)."<br>";

// in_array()
echo in_array("Dhaka", $myArr, true)."<br>";

// array_merge()
$myArr2 = array("Rahim", "Chittagong", 75, false, 5.5, null, "Bd");
$mergeArr = array_merge($myArr, $myArr2);
echo "<pre>";
print_r($mergeArr);
echo "</pre>";

// array_keys()
$myInfo = [
    "name" => "Asif",
    "city" => "Dhaka",
    "weight" => 70,
    "status" => true,
    "height" => 5.8,
    "Grand child" => null,
    "country" => "Bd"
];

$keys = array_keys($myInfo);
echo "<pre>";
print_r($keys);
echo "</pre>";

// array_key_exists()
echo array_key_exists("name", $myInfo)."<br>";

// array_shift()
$shifted = array_shift($myArr);
echo $shifted."<br>";
echo "<pre>";
print_r($myArr);
echo "</pre>";

// array_unshift()
array_unshift($myArr, "Asif");
echo "<pre>";
print_r($myArr);
echo "</pre>";

// array_push()
array_push($myArr, "Male");
echo "<pre>";
print_r($myArr);
echo "</pre>";

// array_pop()
array_pop($myArr);
echo "<pre>";
print_r($myArr);
echo "</pre>";

// array_values()
$values = array_values($myInfo);
echo "<pre>";
print_r($values);
echo "</pre>";

// array_map()
function myFunc($val){
    return $val * 2;
}

$myArr = array(1, 2, 3, 4, 5);
$newArr = array_map("myFunc", $myArr);
echo "<pre>";
print_r($newArr);
echo "</pre>";

// array_unique
$myArr = array(1, 2, 3, 4, 5, 1, 2, 3, 4, 5);
$uniqueArr = array_unique($myArr);
echo "<pre>";
print_r($uniqueArr);
echo "</pre>";

// array_slice()
$slicedArr = array_slice($myArr, 2, 4);
echo "<pre>";
print_r($slicedArr);
echo "</pre>";

// array_diff()
$myArr = array(1, 5, 3, 2, 9, 17);
$myArr2 = array(1, 19, 3, 5, 6, 7, 8, 9);
$diffArr = array_diff($myArr2, $myArr);
echo "<pre>";
print_r($diffArr);
echo "</pre>";

// array_search()
$index = array_search(17, $myArr);
echo $index."<br>";

// array_reverse()
$reverseArr = array_reverse($myArr);
echo "<pre>";
print_r($reverseArr);
echo "</pre>";

// array sort
sort($myArr);
echo "<pre>";
print_r($myArr);
echo "</pre>";

// rsort
rsort($myArr);
echo "<pre>";
print_r($myArr);
echo "</pre>";
?>