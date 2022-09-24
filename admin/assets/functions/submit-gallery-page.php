<?php
    require_once "./assets/functions/header.php";

    $galleryId = "";
    $galleryTitle = "";
    $uploadValid = true;

    // Amount of images has to be more than 1
    if (isset($_FILES['gallery_images'])){
        if (count($_FILES['gallery_images']['name']) < 3){
            echo "
            <script>
                Swal.fire({
                    title: 'Insufficient Images!',
                    text: 'Gallery needs at least 3 images!',
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

    // Edits the gallery's text content
    if (isset($_POST['add-gallery'])
    && $_POST['rand-check'] == $_SESSION['rand'] // Form is not submitted on a refresh
    && $uploadValid 
    ){
        $galleryTitle = htmlspecialchars($_POST['gallery-title']);
        $galleryCreationDate =  htmlspecialchars($_POST['gallery-creation-date']);
        $galleryContent = $_POST['input-html'];
        
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
        $finalOutput = " ";

        $imgArr = array();
        $folderName = $galleryId . '_' . $galleryTitle;
        $imgDirectory = $GALLERY_FOLDERS_DIR . $folderName . '/';
        $getImgFrom = 'gallery_images';

        foreach($_FILES[$getImgFrom]['name'] as $index => $imgName){
            if ($imgName != ""){
                $result = uploadImage($imgDirectory, $imgName, $getImgFrom, $index);
                if ($result->isUploaded){
                    array_push($imgArr, new Image($result->name));
                }
           }
        }
        $finalOutput = json_encode($imgArr);
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