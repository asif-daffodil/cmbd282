<?php  
    if(isset($_POST['uploadBtn'])){
        $fileName = $_FILES['imgFile']['name'];
        $tempName = $_FILES['imgFile']['tmp_name'];

        $caipatAlpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $smallAlpha = "abcdefghijklmnopqrstuvwxyz";
        $numbers = "0123456789";
        $RandomString = str_shuffle(substr($caipatAlpha, 0, 2).substr($smallAlpha, 0, 2).substr($numbers, 0, 2));
        $uniqString = uniqid($RandomString, true);

        // get file extension
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

        // create new file name
        $newFileName = $uniqString.".".$fileExt;

        // create upload folder if not exists
        if(!is_dir("uploads")){
            mkdir("uploads");
        }

        // destination path
        $destination = "uploads/".$newFileName;

        move_uploaded_file($tempName, $destination);
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="imgFile">
    <input type="submit" value="Upload" name="uploadBtn">
</form>