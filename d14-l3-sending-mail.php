<?php  
    // sedding mail
    $to = "asif@dti.ac";
    $subject = "Test mail";
    $message = "Hello! This is a simple email message.";
    $header = "From:asif@hotmail.com";
    $mail = mail($to, $subject, $message, $header);

    if($mail){
        echo "Mail sent successfully";
    }else{
        echo "Mail not sent";
    }
?>