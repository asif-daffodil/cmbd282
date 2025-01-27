<?php  
    // $_COOKIE
    setcookie("name", "John", time() + 60 * 60 * 24 * 30, "/");
    setcookie("age", "25", time() + 3600, "/");  
    
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";

    echo $_COOKIE['name'];
    echo "<br>";
    echo $_COOKIE['age'];

    // unset cookie;
    setcookie("name", "", time() - 3600, "/");
    setcookie("age", "", time() - 3600, "/");
?>