<?php

// !WIP
// Note: Can only be tested if the site is online

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $emailFrom = $_POST['email'];
    $tel = $_POST['tel'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailTo = "princellebinobo@gmail.com"; // TODO: Change to PIHSS email
    $headers = "From: " . $emailFrom;

    // TODO: Confirm custom message
    $txt = "You have received an e-mail from " . $name . ".\n\n" . $message;

    mail($mailTo, $subject, $txt, $headers)
        or die("Error!");

    // header("Location: index.php?mailsent");
}
