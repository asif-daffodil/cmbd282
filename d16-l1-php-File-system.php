<?php  
    // basename()
    $path = $_SERVER['PHP_SELF'];
    $file = basename($path);
    echo $file."<br>";

    // dirname()
    $dir = dirname($path);
    echo $dir."<br>";

    // copy()
    copy("d15-l1-try-catch-through-finally.php", "d15-l1-try-catch-through-finally-copy.php");

    // file()
    $file = file("d15-l1-try-catch-through-finally-copy.php");
    echo "<pre>";
    print_r($file);
    echo "</pre>";

    // file_exists()
    if (file_exists("d15-l1-try-catch-through-finally-copy.php")) {
        echo "File exists";
    }else{
        echo "File does not exist";
    }
    echo "<br>";

    // file_get_contents()
    $file = file_get_contents("d15-l1-try-catch-through-finally-copy.php");
    echo "<pre>" . htmlspecialchars($file) . "</pre>";

    // file_put_contents()
    $file = file_put_contents("d15-l1-try-catch-through-finally-copy.php", "Hello World");
    echo $file."<br>";

    // filesize()
    $file = filesize("d15-l1-try-catch-through-finally-copy.php");
    echo $file."<br>";

    // filetype()
    $file = filetype("d15-l1-try-catch-through-finally-copy.php");
    echo $file."<br>";

    // is_dir()
    if (is_dir("d15-l1-try-catch-through-finally-copy.php")) {
        echo "It is a directory";
    }else{
        echo "It is not a directory";
    }
    echo "<br>";

    // is_file()
    if (is_file("d15-l1-try-catch-through-finally-copy.php")) {
        echo "It is a file";
    }else{
        echo "It is not a file";
    }

    // link()
    $file = link("d15-l1-try-catch-through-finally-copy.php", "d15-l1-try-catch-through-finally-copy-link.php");
    echo $file."<br>";

    // unlink()
    $file = unlink("d15-l1-try-catch-through-finally-copy.php");    
    $file = unlink("d15-l1-try-catch-through-finally-copy-link.php");   
    echo $file."<br>";

    // mkdir()
    if(!is_dir("myDir")){
        mkdir("myDir");
    }

    // rmdir()
    if(is_dir("myDir")){
        rmdir("myDir");
    }

    // move_uploaded_file()

    // pathinfo()
    $file = pathinfo($_SERVER['PHP_SELF']);
    echo "<pre>";
    print_r($file);
    echo "</pre>";
?>