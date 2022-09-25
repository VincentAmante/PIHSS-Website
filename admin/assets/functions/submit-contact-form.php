<?php
if (
    !isset($_POST['name'])
    || !isset($_POST['email'])
    || !isset($_POST['tel'])
    || !isset($_POST['subject'])
    || !isset($_POST['message'])
) {

    // Returns to page  
    $referer = '/contact-us.php?error=true';
    header("Location: $referer");
    exit();
}

if (isset($_POST['submit'])) {

    // Form values
    $name = htmlspecialchars($_POST['name']);
    $emailFrom = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Mail Details
    $mailTo = "info@pihss-shj.com";
    $headers = "From: " . $emailFrom;

    // Message template 
    $txt = "Name: " . $name . "\nMobile Number: " . $tel . "\n\nMessage: " . $message;

    // Sends Message
    mail($mailTo, $subject, $txt, $headers)
        or die("Error!");

    // Returns to page
    $referer = '/contact-us.php?error=true';
    header("Location: $referer");
}
