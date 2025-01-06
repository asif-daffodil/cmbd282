<?php  
    // while loop
    /**
     * starting point
     * increment / decrement
     * ending point
     */

    $x = 0;
    while ($x < 10) {
        echo "$x <br>";
        $x++;
    }

    echo "<br>";

    // do while loop
    $y = 0;
    /* 
    while ($y < 10) {
        echo "$y <br>";
        $y++;
    } 
    */

    do {
        echo "$y <br>";
        $y++;
    } while ($y < 10);

    echo "<br>";

    // for loop
    for ($i = 0; $i < 10; $i++) {
        echo "$i <br>";
    }

    echo "<br>";

    // for
    for ($i=1; $i < 10; $i += 2) { 
        echo "$i <br>";
    }

    echo "<br>";

    for ($i = 0; $i < 100; $i++) {
        if ($i > 7 && $i % 7 == 6) {
            echo "$i <br>";
        }
    }

    echo "<br>";

    $g = 2;
    for ($i=1; $i <= 10; $i++) { 
        echo "$g x $i = ". $g * $i . "<br>";
    }

    echo "<br>";
    for ($i = 9; $i > 0; $i--) { 
        echo "$i <br>";
    }

    echo "<br>";

    // break
    for ($i = 0; $i < 10; $i++) {
        if ($i == 5) {
            break;
        }
        echo "$i <br>";
    }

    echo "<br>";

    // continue
    for ($i = 0; $i < 10; $i++) {
        if ($i % 2 == 0) {
            continue;
        }
        echo "$i <br>";
    }

    // foreach
    $studentName = ["Rahim", "Karim", "Jabbar", "Salim", "Kamal"];
    foreach ($studentName as $name) {
        echo "Student name is : $name <br>";
    }

    $name = "Rahim";
    echo "Student name is : $name <br>";

    $name = "Karim";
    echo "Student name is : $name <br>";

    $name = "Jabbar";
    echo "Student name is : $name <br>";

    $name = "Salim";
    echo "Student name is : $name <br>";

    $name = "Kamal";
    echo "Student name is : $name <br>";

    
?>