<?php  
    include_once("./header.php");

    if(isset($_POST['addUser'])){
        $name = $_POST['name'];
        $sql = "INSERT INTO users (name) VALUES ('$name')";
        $create = mysqli_query($conn, $sql);
        if($create){
            echo "User added successfully";
        }else{
            echo "Failed to add user";
        }
    }
?>
    <h1>Add user</h1>
    <form action="" method="post">
        <input type="text" placeholder="User name" name="name" required>
        <button type="submit" name="addUser">Add user</button>
    </form>

<?php  
    $sql = "SELECT * FROM users";
    $read = mysqli_query($conn, $sql);
    $readData = mysqli_fetch_all($read, MYSQLI_ASSOC);
    foreach($readData as $data){
?>  
        <div>
            <b><?= $data['name']; ?></b>
            <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a>
        </div>
<?php
    }
?>

<?php  
    include_once("./footer.php");
?>
    
