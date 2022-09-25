<?php
    require_once './config.php';

    $errorMessages = [];
    $lastId = "";
    $folderName = "";

    if (!isset($_POST['student-name'])
    || !isset($_POST['student-gender'])
    || !isset($_POST['eid-number'])
    || !isset($_POST['eid-issue'])
    || !isset($_POST['eid-expiry'])
    || !isset($_POST['student-class'])
    || !isset($_POST['father-name'])
    || !isset($_POST['father-number'])
    || !isset($_POST['father-email'])){

        // Returns to page  
        $referer = '/admissions.php?error=true';
        header("Location: $referer");
        exit();
    }

    // Form values
    $studentName = htmlspecialchars($_POST['student-name']);
    $gender = $_POST['student-gender'];
    $dateOfBirth = $_POST['date-of-birth'];
    $eidNumber = htmlspecialchars($_POST['eid-number']);
    $eidIssue = $_POST['eid-issue'];
    $eidExpiry = $_POST['eid-expiry'];
    $eidCopyFront = "";
    $eidCopyBack = "";
    $passportCopy = "";
    $studentClass = $_POST['student-class'];
    $fatherName = htmlspecialchars($_POST['father-name']);
    $fatherNumber = htmlspecialchars($_POST['father-number']);
    $motherNumber = htmlspecialchars($_POST['mother-number']);
    $fatherEmail = htmlspecialchars($_POST['father-email']);
    $leaveCertificate = "";


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
        mkdir(getPathToRoot() . $REG_FORMS_DIR . $lastId . "_" . $studentNameTrimmed);
        $folderName = $lastId . '_' . $studentNameTrimmed;
        $stmt->close();

        require_once "./handle-images.php";
        
        $imagesValid = true;

        $eidImgFront = $_FILES['eid-copy-front']['name'];
        $eidImgBack = $_FILES['eid-copy-back']['name'];
        $passportImg = $_FILES['passport-copy']['name'];
        $leaveCertificateImg = $_FILES['leave-certificate']['name'];

        $imgDirectory = $REG_FORMS_DIR . $folderName . '/';

        if ($eidImgFront != ''){
            $result = uploadImage($imgDirectory, $eidImgFront, 'eid-copy-front');

            if ($result->isUploaded){
                $eidCopyFront = $result->name;
            } else {
                array_push($errorMessages, "Emirates ID Front-Image Error: " . $result->error);
                $imagesValid = false;
            }
        }

        if ($eidImgBack != ''){
            $result = uploadImage($imgDirectory, $eidImgBack, 'eid-copy-back');

            if ($result->isUploaded){
                $eidCopyBack = $result->name;
            } else {
                array_push($errorMessages, "Emirates ID Back-Image Error: " . $result->error);
                $imagesValid = false;
            }
        }

        if ($passportImg != ''){
            $result = uploadImage($imgDirectory, $passportImg, 'passport-copy');

            if ($result->isUploaded){
                $passportCopy = $result->name;
            } else {
                array_push($errorMessages, "Passport Image Error: " . $result->error);
                $imagesValid = false;
            }
        }

        if ($leaveCertificateImg != ''){
            $result = uploadImage($imgDirectory, $leaveCertificateImg, 'leave-certificate');
            
            if ($result->isUploaded){
                $leaveCertificate = $result->name;
            } else {
                array_push($errorMessages, "Leave Certificate Image Error: " . $result->error);
                $imagesValid = false;
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

            
            $referer = '/admissions.php?success=true';
            header("Location: $referer");
            exit();
        }
    }

    // Returns to page  
    $referer = '/admissions.php?error=true';
    header("Location: $referer");
    $conn->close();
?>