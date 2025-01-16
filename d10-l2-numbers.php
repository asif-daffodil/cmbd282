<?php  
    // Making calculations
    echo abs(-4.7); // 4.7
    echo "<br>";
    echo ceil(4.1); // 5
    echo "<br>";
    echo floor(4.9); // 4
    echo "<br>";
    echo round(4.7); // 5
    echo "<br>";
    echo max(4, 5, 6); // 6
    echo "<br>";
    echo min(4, 5, 6); // 4
    echo "<br>";
    echo pow(3, 3); // 27
    echo "<br>";
    echo sqrt(16); // 4
    echo "<br>";

    // built-in numeric functions
    echo is_numeric("hello"); // 0
    echo "<br>";
    echo is_numeric(123); // 1
    echo "<br>";
    echo is_numeric(12.3); // 1
    echo "<br>";
    echo is_numeric("12.3"); // 1
    echo "<br>";
    echo is_numeric("12.3.4"); // 0
    echo "<br>";
    echo is_numeric("12.3a"); // 0
    echo "<br>";

    echo round(120.93556, 2); // 12.35
    echo "<br>";

    // demimal accept 2 digit after point withoud rounding
    echo number_format(5.10, 2); // 120.93
?>