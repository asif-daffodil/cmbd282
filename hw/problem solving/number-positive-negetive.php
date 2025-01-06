<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Positive Or Negative</title>
</head>
<body>
    <center>
    <form method="POST">
        <h1>Enter a number :</h1>
        <hr>
        <input type="number" name="number">
        <input type="submit" name="submit">
    </form>

    <?php
    if($_POST) {
        $number = $_POST ['number'] ;
        if(($number)>0){
            echo"$number is a positive number.";
        }else if (($number)<0) {
            echo"$number is a nagetive number.";
        }else{
            echo"I don't know unsa..ha ha.";
        }
        
    }
    ?>
    </center>
</body>
</html>