<?php  
    function myFunc ($msg = "Asslamuwalaikum", $name = "Selim vai") {
        return $msg." ".$name;
    }

    echo myFunc("Hello", "John");
    echo "<br>";
    echo myFunc("Hi", "PHP");
    echo "<br>";
    echo myFunc(); 
    echo "<br>";
    echo myFunc("Hi");
?>