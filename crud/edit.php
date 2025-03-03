<?php  
    require_once("./header.php");
    isset($_GET['id']) ? $id = $_GET['id'] : header("Location: index.php");
    $sql = "SELECT * FROM users WHERE id = $id";
    $read = mysqli_query($conn, $sql);
    $read->num_rows != 1 ? header(header: "Location: index.php") : $data = mysqli_fetch_assoc($read);

    if(isset($_POST['updateUser'])){
        $name = $_POST['name'];
        $sql = "UPDATE users SET name = '$name' WHERE id = $id";
        $update = mysqli_query($conn, $sql);
        if($update){
            header("Location: index.php");
        }else{
            echo "Failed to update user";
        }
    }
?>
<form action="" method="post">
    <input type="text" placeholder="User name" name="name" required value="<?= $data['name'] ?>">
    <button type="submit" name="updateUser">Update user</button>
</form>

<?php  
    require_once("./footer.php");
?>