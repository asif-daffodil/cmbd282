<?php  
    // indexed array
    // $myInfo = array("Asif", "Dhaka", 70, true);
    $myInfo = ["Asif", "Dhaka", 70, true, 5.8, null, "Bd" ];
    echo $myInfo[1]."<br>";
    echo "<pre>";
    print_r($myInfo);
    echo "</pre>";

    for($i = 0; $i < count($myInfo); $i++){
        echo $myInfo[$i]."<br>";
    }

    foreach($myInfo as $info){
        echo $info."<br>";
    }

    // associative array
    $myInfo = [
        "name" => "Asif",
        "city" => "Dhaka",
        "weight" => 70,
        "status" => true,
        "height" => 5.8,
        "Grand child" => null,
        "country" => "Bd"
    ];
    echo $myInfo['name'];   
    echo "<pre>";
    print_r($myInfo);
    echo "</pre>";

    foreach($myInfo as $key => $val){
        echo $key." : ".$val."<br>";
    }

    // multidimensional array
    $students = [
        ["Asif", "Dhaka", 70, true],
        ["Rahim", "Chittagong", 75, false],
        ["Karim", "Sylhet", 80, true],
        ["Jabbar", "Khulna", 85, false],
        ["Salim", "Rajshahi", 90, true]
    ];

    echo $students[4][2]."<br>";
    echo "<pre>";
    print_r($students);
    echo "</pre>";

    for ($i = 0; $i < count($students); $i++){
        for ($j = 0;  $j < count($students[$i]); $j++){
            echo $students[$i][$j]." ";
        }
        echo "<br>";
    }

    foreach($students as $std){
        foreach($std as $info){
            echo $info." ";
        }
        echo "<br>";
    }

    $students = [
        ["name" => "Asif", "city" => "Dhaka", "weight" => 70, "status" => true],
        ["name" => "Rahim", "city" => "Chittagong", "weight" => 75, "status" => false],
        ["name" => "Karim", "city" => "Sylhet", "weight" => 80, "status" => true],
        ["name" => "Jabbar", "city" => "Khulna", "weight" => 85, "status" => false],
        ["name" => "Salim", "city" => "Rajshahi", "weight" => 90, "status" => true]
    ];

    foreach($students as $std){
        echo "Student Name: ".$std['name']." lives in ".$std['city']." and his weight is ".$std['weight']." and his status is ".($std['status'] ? "Active" : "Inactive")."<br>";
    }

?>