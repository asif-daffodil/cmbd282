<?php  
    // Regular expressions
    $str = "Hello World";
    echo preg_match("/World/", $str); // 1
    echo "<br>";
    echo preg_match("/world/", $str); // 0
    echo "<br>";
    echo preg_match("/world/i", $str); // 1
    echo "<br>";
    echo preg_match("/^Hello/", $str); // 1
    echo "<br>";
    echo preg_match("/World$/", $str); // 1
    echo "<br>";
    echo preg_match("/^World$/", $str); // 0
    echo "<br>";
    echo preg_match("/[aeiou]/", $str); // 1
    echo "<br>";
    echo preg_match("/[a-z]/", $str); // 1
    echo "<br>";
    echo preg_match("/[A-Z]/", $str); // 1
    echo "<br>";
    echo preg_match("/[0-9]/", $str); // 0
    echo "<br>";
    echo preg_match("/[0-9]/", "Hello 123 World"); // 1
    echo "<br>";
    echo preg_match("/[0-9]+/", "Hello 132 World"); // 1
    echo "<br>";
    echo preg_match("/[0-9]+/", "Hello World"); // 0
    echo "<br>";
    echo preg_match("/[0-9]+/", "Hello 1234 World"); // 1
    echo "<br>";
    echo preg_match("/[0-9]{4}/", "Hello 1234 World"); // 1
    echo "<br>";
    echo preg_match("/[0-9]{4}/", "Hello 123 World"); // 0
    echo "<br>";
    echo preg_match("/[0-9]{4}/", "Hello 12345 World"); // 1
    // {4} means 4 digits
    echo "<br>";
    echo preg_match("/[0-9]{4,}/", "Hello 12345 World"); // 1
    echo "<br>";
    echo preg_match("/[0-9]{4,}/", "Hello 123 World"); // 0
    echo "<br>";
    echo preg_match("/[0-9]{4,}/", "Hello 1234567890 World"); // 1
    // {4,} means 4 or more digits
    echo "<br>";
    echo preg_match("/\b[0-9]{4,6}\b/", "Hello 1234567890 World"); // 0
    // {4,6} means 4 to 6 digits
?>