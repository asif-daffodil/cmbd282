<?php  
    // $_GET['name'] = "John";

    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    echo $_GET['name'];
    echo "<br>";
    // null coalescing operator
    echo $_GET['age'] ?? "Not set";
?>