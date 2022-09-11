<?php

    if (isset($_POST['add-gallery'])){
        require "config.php";

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
        $imgDirectory = $GALLERY_THUMBNAILS_DIR;
        $getImgFrom = 'gallery-image';
        
        if ($imgName != ""){
            $result = uploadImage($imgDirectory, $imgName, $getImgFrom, -1);
            if ($result != false){
                // Saves directory to be sent to database
                $imgName = $result->name;
            } else {
                $imgValid = false;
            }
       }

        if ($imgValid){
            $lastId = "";

            if ($conn->connect_error){
                die('Connection Failure : ' + $conn->connect_error);
            } else {
                $stmt = $conn->prepare("INSERT INTO galleries(title, creationDate, description, thumbnail) VALUES('$galleryTitle','$galleryCreationDate', '$galleryDescription', '$imgName')");
                $stmt->execute();
                
                // Saves last id for use in making directory folder
                $lastId = mysqli_insert_id($conn);

                $folderName = $lastId . '_' . $galleryTitle;
                $stmt->close();
                
                // Creates permanent folderName for assets
                mkdir(getPathToRoot() . "./assets/gallery-folders/" . $folderName);
                $stmt = $conn->prepare("UPDATE galleries SET folderName = '$folderName' WHERE id='$lastId'");
                $stmt->execute();

                $conn->close();
            }
        
            // Moves on to Edit Content
            header("Location: ../../update-gallery-content.php?id=" . $lastId);
        }
    }

    $conn->close();
?>