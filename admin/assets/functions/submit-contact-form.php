<?php

if (isset($_POST['submit'])) {
    require_once './config.php';

    // Form values
    $name = $_POST['name'];
    $emailFrom = $_POST['email'];
    $tel = $_POST['tel'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailTo = "info@pihss-shj.com";
    $headers = "From: " . $emailFrom;

    // Message template 
    $txt = "You have received an e-mail from " . $name . ".\n\n" . $message;

    mail($mailTo, $subject, $txt, $headers)
        or die("Error!");

    // Returns to page
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
}
