<?php

    if (isset($_POST['add-gallery'])){
        require "connect.php";

        $galleryTitle = $_POST['gallery-title'];
        $galleryCreationDate = $_POST['gallery-creation-date'];
        $galleryDescription = $_POST['gallery-description'];

        // IMAGE HANDLING
        $imgValid = true;
        $imgName = $_FILES['gallery-image']['name'];
        if ($imgName == null){
            exit();
        }

        if ($imgName != ""){
             // Directory = Where image will end up when uploaded in the directory
            $imgDirectory = "./assets/gallery-thumbnails/";
            $imgType = pathinfo($imgName, PATHINFO_EXTENSION);
            $imgName = $imgDirectory . uniqid() .basename($imgName);

            if($_FILES['gallery-image']['size'] > 10000000000){
                echo "FILE TOO LARGE";
                $imgValid = false;
            }

            // Valid image types
            switch(strtolower($imgType)){
                case 'jpeg':
                case 'png':
                case 'jpg':
                case 'jfif':
                case 'gif':
                break;
                default:
                echo 'Invalid filetype';
                $imgValid = false;
            }


            if ($imgValid){
                if (move_uploaded_file($_FILES['gallery-image']['tmp_name'], "../../" . $imgName)){
                    
                }
                else {
                    // Img failed
                    $imgValid = false;
                    exit();
                }
            }
        }

        if ($imgValid){
            if ($conn->connect_error){
                die('Connection Failure : ' + $conn->connect_error);
            } else {
                $stmt = $conn->prepare("INSERT INTO galleries(title, creationDate, description, thumbnail) VALUES('$galleryTitle','$galleryCreationDate', '$galleryDescription', '$imgName')");
                $stmt->execute();
                
                $last_id = mysqli_insert_id($conn);
                mkdir("../../assets/" . $last_id . "_" . $galleryTitle);
                $stmt->close();
                $conn->close();
            }
        
            // Returns to page
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }
?>