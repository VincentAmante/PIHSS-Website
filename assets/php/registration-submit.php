<?php
    // Server Stuff idk
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $databasename = 'pihss';
    

    $studentName = $_POST['student-name'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['date-of-birth'];
    $eidNumber = $_POST['eid-number'];
    $eidIssue = $_POST['eid-issue'];
    $eidExpiry = $_POST['eid-expiry'];
    $eidCopyFront = $_FILES['eid-copy-front'];
    $eidCopyBack = $_FILES['eid-copy-back'];
    $passportCopy = $_FILES['passport-copy'];
    $studentClass = $_POST['student-class'];

    $conn = new mysqli($hostname, $username, '', $databasename);

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration(studentName,gender,dateOfBirth,eidNumber,eidIssue,eidExpiry,studentClass) VALUES('$studentName', '$gender', '$dateOfBirth', '$eidNumber', '$eidIssue', '$eidExpiry','$studentClass')");
        $stmt->execute();
        echo "sample is done";
        $stmt->close();
        $conn->close();
    }

    // Returns to page
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
?>