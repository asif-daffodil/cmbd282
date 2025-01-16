<?php  
    // $GLOBALS 
    $x = 5;
    $y = 10;
    
    function myFunc() {
        global $y;
        echo $GLOBALS['x'] + $y;
    }

    myFunc();

    // $_SERVER
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";

?>