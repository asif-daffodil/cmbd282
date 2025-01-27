

<form action="./d12-l4-cookie.php" method="get">
    <input type="text" placeholder="Your Name" name="userName">
    <br><br>
    <input type="text" placeholder="Your Email" name="userEmail">
    <br><br>
    <input type="text" placeholder="Your City" name="userCity">
    <br><br>
    <button type="submit">Show Name</button>
</form>

<?php  
    echo $_POST["userName"] ?? null;
    echo "<br>";
    echo $_POST["userEmail"] ?? null;
    echo "<br>";
    echo $_POST["userCity"] ?? null;
?>