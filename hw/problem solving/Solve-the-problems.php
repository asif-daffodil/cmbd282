<?php

//! i.
$ElectricBill= 260;
if ($ElectricBill<=50 && $ElectricBill>=1){
  echo "3.50 tk/unit";
} elseif($ElectricBill>=51 && $ElectricBill<100) {
  echo "4.00 tk/unit";
}elseif ($ElectricBill>=100 && $ElectricBill<250){
  echo "5.20 tk/unit";
}else{
  echo "6.50 tk/unit";
}
echo "<br>";

//!  ii.
$maths=20/20;
switch ($maths) {
  case 40:
    echo "Addition result";
    break;
  case 0:
    echo "Subtraction result";
    break;
  case 400:
    echo "Multiplication result";
    break;
  case 1:
    echo "Division result";
    break;
  default:
    echo "Not a result";
    break;
}
echo "<br>";

//! iii.
$manAge=18;
switch ($manAge) {
  case $manAge>=1 && $manAge<18:
    echo "Child Boy";
    break;
  default:
    echo "Can Vote";
    break;
}
echo "<br>";
