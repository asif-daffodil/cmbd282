<?php  
    $capital = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $small = "abcdefghijklmnopqrstuvwxyz";
    $number = "0123456789";
    $special = "!@#$%^&*()_+";
    echo str_shuffle(substr(str_shuffle($capital), 0, 2).substr(str_shuffle($small), 0, 2).substr(str_shuffle($number), 0, 2).substr(str_shuffle($special), 0, 2));
    echo "<br>";
    echo uniqid("user_",  true);
    echo "<br>";
    echo rand(1000, 9999);  
?>
<br>
<a href="./d10-random-password-generator.php">
    <button>Reload</button>
</a>