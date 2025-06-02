<!DOCTYPE html>
<html lang="en">
<?php
$title = "Contact Us";
require_once './components/header.php';
if(isset($_POST['send_message'])) {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $message = sanitize($_POST['message']);

    if (empty($name)) {
        $errName = "Please enter your name.";
    } elseif (!preg_match("/^[A-Za-z.\- ]*$/", $name)) {
        $errName = "Invalid Name";
    } else {
        $crrName = $name;
    }

    if (empty($email)) {
        $errEmail = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid Email";
    } else {
        $crrEmail = $email;
    }

    if (empty($message)) {
        $errMessage = "Please enter your message.";
    } else {
        $crrMessage = $message;
    }

    if (isset($crrName) && isset($crrEmail) && isset($crrMessage)) {
        // email asif@dti.ac the details

        /*
        $to = "asif@dti.ac";
        $subject = "Contact Form Submission from $crrName";
        $body = "Name: $crrName\nEmail: $crrEmail\nMessage: $crrMessage";
        $headers = "From: $crrEmail";
        mail($to, $subject, $body, $headers);
        // show success message
        echo "<script>toastr.success('Message sent successfully!');</script>";
        */

        // Save data to contact form table
        $sql = "INSERT INTO contact (name, email, message) VALUES ('$crrName', '$crrEmail', '$crrMessage')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>toastr.success('Message sent successfully!');</script>";
        } else {
            echo "<script>toastr.error('Failed to send message. Please try again later.');</script>";
        }
    }
}       
?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-6">
            <h1 class="my-4">Contact Us</h1>
            <form action="./contact" method="post">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="send_message">Send Message</button>
            </form>
        </div>
        <div class="col-md-6">
            <!-- google map iframe codemanbd address dhaka -->
            <h2 class="my-4">Our Location</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.902123456789!2d90.41234567890123!3d23.810345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a8b9a8b9a9%3A0x1234567890abcdef!2sGoogle%20Map%20Location%20Example!5e0!3m2!1sen!2sbd!4v1612345678901" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

</div>
<?php
require_once './components/footer.php';
?>