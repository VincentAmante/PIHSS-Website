<?php
    $lastId = "";
    $folderName = "";

    // Server Stuff
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $databasename = 'pihss';
    
    // Form values
    $studentName = $_POST['student-name'];
    $gender = $_POST['student-gender'];
    $dateOfBirth = $_POST['date-of-birth'];
    $eidNumber = $_POST['eid-number'];
    $eidIssue = $_POST['eid-issue'];
    $eidExpiry = $_POST['eid-expiry'];
    $eidCopyFront = "";
    $eidCopyBack = "";
    $passportCopy = "";
    $studentClass = $_POST['student-class'];
    $fatherName = $_POST['father-name'];
    $fatherNumber = $_POST['father-number'];
    $motherNumber = $_POST['mother-number'];
    $fatherEmail = $_POST['father-email'];
    $leaveCertificate = "";

    $conn = new mysqli($hostname, $username, '', $databasename);

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT 
        INTO registrations(
                studentName,
                gender,
                dateOfBirth,
                eidNumber,
                eidIssue,
                eidExpiry,
                studentClass,
                fatherName,
                fatherNumber,
                motherNumber,
                fatherEmail) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('sssssssssss',
        $studentName,
        $gender,
        $dateOfBirth,
        $eidNumber,
        $eidIssue,
        $eidExpiry,
        $studentClass,
        $fatherName,
        $fatherNumber,
        $motherNumber,
        $fatherEmail);
        $stmt->execute();
        $lastId = mysqli_insert_id($conn);

        $studentNameTrimmed = trim($studentName);
        mkdir("../../../assets/registration-forms/" . $lastId . "_" . $studentNameTrimmed);
        $folderName = $lastId . '_' . $studentNameTrimmed;
        $stmt->close();

        include "./handle-images.php";
        
        $imagesValid = true;

        $eidImgFront = $_FILES['eid-copy-front']['name'];
        $eidImgBack = $_FILES['eid-copy-back']['name'];
        $passportImg = $_FILES['passport-copy']['name'];
        $leaveCertificateImg = $_FILES['leave-certificate']['name'];

        $imgDirectory = "./assets/registration-forms/" . $folderName . '/';
        if ($eidImgFront != ''){
            $result = uploadImage($imgDirectory, $eidImgFront, 'eid-copy-front', -1, true);

            if ($result == false){
                $imagesValid = false;
            } else {
                $eidCopyFront = $result;
            }
        }
        if ($eidImgBack != ''){
            $result = uploadImage($imgDirectory, $eidImgBack, 'eid-copy-back', -1, true);

            if ($result == false){
                $imagesValid = false;
            } else {
                $eidCopyBack = $result;
            }
        }
        if ($passportImg != ''){
            $result = uploadImage($imgDirectory, $passportImg, 'passport-copy', -1, true);

            if ($result == false){
                $imagesValid = false;
            } else {
                $passportCopy = $result;
            }
        }
        if ($leaveCertificateImg != ''){
            $result = uploadImage($imgDirectory, $leaveCertificateImg, 'leave-certificate', -1, true);
            if ($result == false){
                $imagesValid = false;
            } else {
                $leaveCertificate = $result;
            }
        }

        if ($imagesValid){
            $imageQuery = "UPDATE registrations 
            SET eidCopyFront = '$eidCopyFront',
                eidCopyBack = '$eidCopyBack',
                passportCopy = '$passportCopy',
                leaveCertificate = '$leaveCertificate'
            WHERE id='$lastId'";

            $stmt = $conn->prepare($imageQuery);
            $stmt->execute();
            $stmt->close();
        }
    }



    $conn->close();
    // Returns to page  
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
?>