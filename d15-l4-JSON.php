<?php 
    $myInfo = [
        "name" => "Asif",
        "age" => 25,
        "email" => "asif@gmmail.com",
        "phone" => "01712345678"
    ];

    $json = json_encode($myInfo);
    echo $json;

    // myinto in json data
    $myJson =  '{
        "name": "Asif",
        "age": 25,
        "email": "amar@email.com"
    }';

    $myArray = json_decode($myJson, true);
    echo "<pre>";
    print_r($myArray);
    echo "</pre>";
?>