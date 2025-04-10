<?php
function senitize($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$conn = mysqli_connect('127.0.0.1', 'root', '', 'imrancmbd282');


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- jQuery CDN Link   -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <!-- Toastr CDN Function Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- change toastr command -->
    <script>
    toastr.options = {
        "positionClass": "toast-bottom-center",
    }
    </script>




</head>

<body style="min-height: 100vh;">

    <?php
    require_once('navbar.php');
    ?>