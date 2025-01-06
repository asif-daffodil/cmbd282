<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Case</title>
</head>
<body>
   <center>
   <form action="" method="post">
        <input type="text" name="n" value="" placeholder="enter no"><br>
        <input type="text" name="n2" value="" placeholder="enter no"><br>
        <input type="submit" name="a" value=" ADD + ">
        <input type="submit" name="m" value=" MUL * ">
        <input type="submit" name="d" value=" DIV / ">
        <input type="submit" name="s" value=" sub - ">
    </form>
    <?php
    if(isset($_POST['a']))  //a is a add button name
    {
        $n = $_POST['n']; //textbox 1
        $n2 = $_POST['n2']; //textbox 2
        $add = $n+$n2; //addition logic here 
        echo "Addition Is".$add; //calculate
    }
    // Multiplication
    if(isset($_POST['m']))  //m is a Multiplication  button name
    {
        $n = $_POST['n']; //textbox 1
        $n2 = $_POST['n2']; //textbox 2
        $add = $n*$n2; //Multiplication logic here 
        echo "Multiplication Is".$m; //calculate
    }
    // Divide 
    if(isset($_POST['d']))  //m is a Division  button name
    {
        $n = $_POST['n']; //textbox 1
        $n2 = $_POST['n2']; //textbox 2
        $add = $n/$n2; //Division logic here 
        echo "Divide Is".$d; //calculate
    }
    // Substraction 
    if(isset($_POST['s']))  //m is a Substraction  button name
    {
        $n = $_POST['n']; //textbox 1
        $n2 = $_POST['n2']; //textbox 2
        $add = $n-$n2; // Minus logic here 
        echo "Substraction Is".$d; //calculate
    }

    ?>
    
   </center>
</body>
</html>