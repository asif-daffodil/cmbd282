<?php

// i
$maxValue=[2,4,9,3,2,7];
echo "max number = ",max($maxValue);
echo "<br> <br>";

// ii
echo "Second maximum value: ",$maxValue[5];
echo "<br>";

// iii
$sortArray=[3,9,6,10,7];
sort($sortArray);
echo "<pre>";
print_r($sortArray);
echo "</pre>";

// iv
$number=[9,7,5,8,4,10,15];
$sumArray=array_sum($number);
$countArray=count($number);
echo "<pre>";
print_r($number);
echo "</pre>";

$average=$sumArray / $countArray;

echo ("Average : ". $average);

// v
$array1=["Tahin","Jihad",20,50];
$array2=["Rassal",40,"Tamim",2025];
$addArray=array_merge($array1,$array2);
echo "<pre>";
print_r($addArray);
echo "</pre>";

// vi
$studentName=["Jihad","Tahin","Forkan","Emon"];
$searchArray= in_array("Forkan",$studentName);
echo ($searchArray);

// vii
$studentName=["Jihad","Tahin","Forkan","Emon"];
$lowercaseArray=array_map("strtolower",$studentName);
echo "<pre>";
echo ("lowercase ");
print_r($lowercaseArray);
echo "</pre>";

$uppercaseArray=array_map("strtoupper",$studentName);
echo "<pre>";
echo ("uppercase ");
print_r($uppercaseArray);
echo "</pre>";

// viii
$thisNumber=[3,8,9,6,8,9,4,8,2,10,24,2];

// ix 
$removeArray=array_unique($thisNumber);
echo "<pre>";
print_r($removeArray);
echo "</pre>";

// x
$myDetails=[
  "Name"=>"Tahin",
  "Hight"=>"5.6",
  "Wight"=>61,
  "Email"=>"mdtahinhassan@gmail.com"
];
$checkEmail=array_key_exists("Email",$myDetails);
echo $checkEmail,"<br>";

// xi
$CheckName=array_key_exists("Name",$myDetails);
echo $CheckName,"<br>";

// xii
$listValue=array_keys($myDetails);
echo "<pre>";
print_r($listValue);
echo "</pre>";

// xiii
$array1=[8,10,9,6,7,12,2,15,11];
$array2=[5,20,11,7,14,1,9,6,19,2];

$betweenArray=array_diff($array1,$array2);
echo "<pre>";
print_r($betweenArray);
echo "</pre>";

// xiv
$studentName=["Jihad","Forkan","Emon"];
foreach ($studentName as $name){
  $allstringcheck=is_string($name);
}
echo "Value :",$allstringcheck;

// xv
$array1=[9,6,8,4,7,10,11];
$array2=[9,10,11,15,8,2,3,7];
$addArray=array_merge($array1,$array2);

$unionArray=array_unique($addArray);
echo "<pre>";
print_r($unionArray);
echo "</pre>";

//  xvi
$myDetails=[
  "Name"=>"Tahin",
  "Hight"=>"5.6",
  "Wight"=>61,
  "Email"=>"mdtahinhassan@gmail.com"
];
$keyArray=array_keys($myDetails);
echo "<pre>";
print_r($keyArray);
echo "</pre>";

// xvii
$studentValue=[
  ["Name"=>"Jihad","Divison"=>"Bhola","Roll"=>10090],
  ["Name"=>"Mamun","Divison"=>"Dhaka","Roll"=>11890],
  ["Name"=>"Tahin","Divison"=>"Sylhet","Roll"=>24090],
  ["Name"=>"Bayzid","Divison"=>"Khulna","Roll"=>18090],
];
echo "<pre>";
print_r($studentValue);
echo "</pre>";


?>