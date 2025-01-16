<?php  
    // Concatenating strings
    $name = "John";
    $age = 25;
    echo "My name is ".$name." and I am ".$age." years old.";
    echo "<br>";

    // Trimming strings
    $str = " Hello World ";
    echo trim($str);
    echo "<br>";

    // Removing slashes and other harmful characters
    $str = "<script>alert('your website is hacked!')</script>";
    echo htmlspecialchars($str);
    echo "<br>";

    // String functions
    echo strlen("Hello World"); // 11
    echo "<br>";
    echo str_word_count("Hello World"); // 2
    echo "<br>";
    echo strrev("Hello World"); // dlroW olleH
    echo "<br>";
    echo strpos("Hello World", "World"); // 6
    echo "<br>";
    echo str_replace("World", "John", "Hello World"); // Hello John
    echo "<br>";
    echo strtoupper("Hello World"); // HELLO WORLD
    echo "<br>";
    echo strtolower("Hello World"); // hello world
    echo "<br>";
    echo ucfirst("hello world"); // Hello world
    echo "<br>";
    echo ucwords("hello world"); // Hello World
    echo "<br>";
    echo lcfirst("Hello World"); // hello World
    echo "<br>";
    echo str_repeat("Hello World", 2); // Hello WorldHello World
    echo "<br>";
    echo str_shuffle("Hello World"); // lHrWd oelol
    echo "<br>";
    // explode() function
    $str = "Hello World";
    $arr = explode(" ", $str);
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    // implode() function
    $str = implode(" ", $arr);
    echo $str;
    echo "<br>";
    // substr() function
    echo substr("Hello World", 6, 5); // World
?>