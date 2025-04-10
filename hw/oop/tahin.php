<?php

//  1
class myWrite
{
  public function write()
  {
    return "Hello World";
  }

}
$myWriteObject = new myWrite;
echo $myWriteObject->write();

echo "<br>";

//  2  
class myName
{
  public function names($name)
  {
    return "My Name Is" . $name;
  }
}
$myNameObject = new myName;
echo $myNameObject->names(" Tahin ");

echo "<br>";


//3
class myCalculator
{
  public function calculate($num)
  {
    if ($num < 0) {
      return " This numbers.";
    }
    $number = 1;
    for ($i = 1; $i <= $num; $i++) {
      $number *= $i;  
    }
    return $number;
  }
}
$mycalculateObject = new myCalculator;
echo $mycalculateObject->calculate(4);

echo "<br>";

// 5

class Dates
{
  public function dateFach($date1, $date2)
  {
    $dateNumber1 = new DateTime($date1);
    $dateNumber2 = new DateTime($date2);
    $date = $dateNumber1->diff($dateNumber2);

    return "Date : " . $date->y . " years ," . $date->m . " months ," . $date->d . " days";
  }
}
$datesObject = new Dates;

$date1 = "2005-1-1";
$date2 = "2025-1-1";


echo $datesObject->dateFach($date1, $date2);