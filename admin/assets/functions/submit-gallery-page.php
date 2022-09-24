<?php
    require_once "./assets/functions/header.php";

    $galleryId = "";
    $galleryTitle = "";
    $uploadValid = true;

    // Amount of images has to be more than 1
    if (isset($_FILES['gallery_images'])){
        if (count($_FILES['gallery_images']['name']) < 1){
            echo "
            <script>
                Swal.fire({
                    title: 'Insufficient Images!',
                    text: 'Activities needs at least 1 image!',
                    icon: 'warning',
                    confirmButtonColor: '#1B9B55',
                    confirmButtonText: 'Ok'
                });
                </script>";
                $uploadValid = false;
            }
    }

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {

    }

    // FUNCTIONALLY, galleries are just activities but with an image limit

    // Edits the gallery's text content
    if (isset($_POST['add-gallery'])
    && $_POST['rand-check'] == $_SESSION['rand'] // Form is not submitted on a refresh
    && $uploadValid 
    ){
        $galleryTitle = htmlspecialchars($_POST['gallery-title']);
        $galleryCreationDate = $_POST['gallery-creation-date'];
        $galleryContent = $_POST['input-html'];
        $isTrue = true;
        
        $updateQuery = $conn->prepare("INSERT INTO galleries(title, creationDate, description, isActivity) 
        VALUES('$galleryTitle', '$galleryCreationDate', '$galleryContent', 
        '0')");
        $updateQuery->execute();

        // Adds id
        $last_id = mysqli_insert_id($conn);
        $galleryId = $last_id;
        mkdir("../assets/gallery-folders/" . $last_id . "_" . $galleryTitle);
    }

    // UPLOADS IMAGE CONTENTS
    if (!empty($_FILES)
        && isset($_POST['add-gallery'])
        && $_POST['rand-check'] == $_SESSION['rand'] // Form is not submitted on a refresh
        && $galleryId != null
        && $uploadValid ){
        require_once './assets/functions/image-class.php';
        require_once './assets/functions/handle-images.php';

        // Verifies images first
        $imagesValid = true;
        $finalOutput = " ";
        $imgArr = array();
        $folderName = $galleryId . '_' . $galleryTitle;

        $imgDirectory = $GALLERY_FOLDERS_DIR . $folderName . '/';
        $getImgFrom = 'gallery_images';

        foreach($_FILES[$getImgFrom]['name'] as $index => $imgName){
            if ($imgName != ""){
                $result = uploadImage($imgDirectory, $imgName, $getImgFrom, $index);
                if ($result != false){
                    array_push($imgArr, new Image($result->name));
                }
           }
        }

        $finalOutput = json_encode($imgArr);
        // Handles entries for deletion
        // Locates entries to be deleted, before updating the array
        if (isset($_POST['deletion-entries'])){
            deleteImages($galleryFiles, $_POST['deletion-entries'], $imgDirectory);
        }

        $updateQuery = $conn->prepare("UPDATE galleries SET images = '$finalOutput', folderName = '$folderName' WHERE id='$galleryId'");
        $updateQuery->execute();

        // Repeats query to match update
        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
            $gallery = mysqli_fetch_assoc($galleryQuery);
        }
        unset($_POST);
        
        $currentFiles = $finalOutput;
        header("Location: ./update-gallery-content.php?id=" . $last_id . '&result=success');
    }

    $conn->close();
?>