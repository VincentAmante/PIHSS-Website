<?php

    if (isset($_POST['add-gallery'])){
        require "connect.php";

        $galleryTitle = $_POST['gallery-title'];
        $galleryCreationDate = $_POST['gallery-creation-date'];
        $galleryDescription = $_POST['input-html'];

        // IMAGE HANDLING
        $imgValid = true;
        $imgName = $_FILES['gallery-image']['name'];
        if ($imgName == null){
            exit();
        }

        include './handle-images.php';
        $imgDirectory = "./assets/gallery-thumbnails/";
        $getImgFrom = 'gallery-image';
        
        if ($imgName != ""){
            $result = uploadImage($imgDirectory, $imgName, $getImgFrom, -1, true);
            if ($result != false){
                $imgName = $result;

            } else {
                $imgValid = false;
            }
       }

        if ($imgValid){
            if ($conn->connect_error){
                die('Connection Failure : ' + $conn->connect_error);
            } else {
                $stmt = $conn->prepare("INSERT INTO galleries(title, creationDate, description, thumbnail) VALUES('$galleryTitle','$galleryCreationDate', '$galleryDescription', '$imgName')");
                $stmt->execute();
                
                $last_id = mysqli_insert_id($conn);
                mkdir("../../../assets/gallery-folders/" . $last_id . "_" . $galleryTitle);
                $stmt->close();
                $conn->close();
            }
        
            // Moves on to Edit Content
            header("Location: ../../update-gallery-content.php?id=" . $last_id);
        }
    }
?>