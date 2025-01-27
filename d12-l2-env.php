<?php  
// $_ENV

echo "<pre>";
print_r($_ENV);
echo "</pre>";

$_ENV['DB_USER'] = "root";
$myInfo = "Web Developer";

function myFunc() {
    echo $_ENV['DB_USER']."<br>".$GLOBALS['myInfo'];
}

// about $_env: https://www.php.net/manual/en/reserved.variables.environment.php


?>