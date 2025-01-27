<?php  
session_start();

$_SESSION['name'] = "John";
$_SESSION['age'] = 25;
$_SESSION['email'] = "john@email.com";

echo $_SESSION['name'];
echo "<br>";
echo $_SESSION['age'];
echo "<br>";
echo $_SESSION['email'];

// session_unset();
?>