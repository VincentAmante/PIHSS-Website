<?php
    include "./assets/functions/header.php";
    $galleryId = $_GET['id'];


    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
        $gallery = mysqli_fetch_assoc($galleryQuery);
    }

    include './assets/functions/handle-images.php';
    
    // UPLOADS IMAGE CONTENTS
    if (!empty($_FILES)
        && isset($_POST['save-gallery-content'])
        && $_POST['rand-check'] == $_SESSION['rand'] // Form is not submitted on a refresh
        && $galleryId != null){
        include './assets/functions/image-class.php';

        // Verifies images first
        $imagesValid = true;
        $finalOutput = " ";
        $imgArr = array();

        $imgDirectory = "./assets/gallery-folders/" . $gallery['folderName'] . '/';
        $getImgFrom = 'gallery_images';

        foreach($_FILES[$getImgFrom]['name'] as $index => $imgName){
            if ($imgName != ""){
                $result = uploadImage($imgDirectory, $imgName, $getImgFrom, $index);
                if ($result != false){
                    array_push($imgArr, new Image($result));
                }
           }
        }

        $finalOutput = json_encode($imgArr);
        $galleryFiles = json_decode($gallery['images']);
        // Handles entries for deletion
        // Locates entries to be deleted, before updating the array
        if (isset($_POST['deletion-entries'])){
            deleteImages($galleryFiles, $_POST['deletion-entries']);
        }

        if ($galleryFiles != null){
            $finalOutput = json_encode(array_merge($galleryFiles, $imgArr));
        }
  
        $updateQuery = $conn->prepare("UPDATE galleries SET images = '$finalOutput' WHERE id='$galleryId'");
        $updateQuery->execute();

        /// Handle Image Changes
        $imgName = $_FILES['gallery-thumbnail']['name'];  
        $origImgSrc = $_POST['img-src'];

        // Changes image if the thumbnails are not the same
        if ($imgName != "" 
        && ('../' . $imgName != $origImgSrc)){
            $imgDirectory = "./assets/gallery-thumbnails/";
            $resultThumbnail = uploadImage($imgDirectory, $imgName, 'gallery-thumbnail', -1);

            // Uploads new image, and deletes old one
            if ($resultThumbnail != false){
                $imgName = $resultThumbnail;
                unlink('../' . $gallery['thumbnail']);

                $updateQuery = $conn->prepare("UPDATE galleries 
                SET thumbnail = '$imgName'
                WHERE id='$galleryId'");
                $updateQuery->execute();
            }
        }


        // Repeats query to match update
        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
            $gallery = mysqli_fetch_assoc($galleryQuery);
        }
    }

    // Edits the gallery's text content
    if (isset($_POST['save-gallery-content'])
    && $_POST['rand-check'] == $_SESSION['rand'] // Form is not submitted on a refresh
    && $galleryId != null){


        $galleryTitle = $_POST['gallery-title'];
        $galleryCreationDate = $_POST['gallery-doc'];
        $galleryContent = $_POST['input-html'];

        $updateQuery = $conn->prepare("UPDATE galleries 
        SET title = '$galleryTitle',
            creationDate = '$galleryCreationDate',
            description = '$galleryContent'
        WHERE id='$galleryId'");
        $updateQuery->execute();
    }

    unset($_POST);
    $currentFiles = $gallery['images'];
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <title>Admin - Gallery Page Submission</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/add-article.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />
</head>
<body>
    <main>
        <section>
            <div class="form-wrapper" id="drop-area">
                <form class="admin-form" id="admin-form" 
                    action="<?php echo 'update-gallery-content.php?id=' . $gallery['ID'];?>" 
                    method="POST" 
                    enctype="multipart/form-data">
                    <?php
                        // Prevents resubmission on refresh
                        $rand = rand();
                        $_SESSION['rand'] = $rand;
                    ?>
                    <div class="form-item">
                        <label for="gallery-title">Title</label>
                        <input type="text" id="gallery-title" name="gallery-title" spellcheck="false" autocomplete="off" required value="<?php echo $gallery['title']?>">
                    </div>    
                    <div class="form-item">
                        <label for="gallery-doc">Date of Creation</label>
                        <input type="date" name="gallery-doc" required value=<?php echo $gallery['creationDate']?>>
                    </div>
                    <div class="form-item">
                        <label for="gallery-content">Content</label>
                        <div>          
                            <input name="input-delta" type="hidden">
                            <input name="input-html" type="hidden">
                            <div class="editor-container" id="editor-container">
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="">Upload Image</label>
                        <label class="uploader-single" ondragover="return false">
                            <i class="icon-upload icon"></i>
                            <img src="<?php echo '../' . $gallery['thumbnail']?>" class="" id="form-img" onchange="setImgSrc();">
                            <input type="file" accept="image/*" name="gallery-thumbnail" id="gallery-thumbnail">
                        </label>
                        
                        <input type="hidden" name="img-src" id="img-src">
                    </div>

                    <div class="form-item" id="gallery-view">
                        <label for="fileElem">Upload images to the gallery</label>
                        <input type="file" 
                            accept="image/*" 
                            multiple name="gallery_images[]" 
                            id="fileElem" 
                            onchange="handleFiles(this.files)">
                    </div>
                    <progress id="progress-bar" max=100 value=0></progress>

                    <h2>Image Additions</h2>
                    <div class="multiple-file-preview" id="gallery">

                    </div>

                    <h2>Existing Images</h2>
                    <div class="multiple-file-preview" id="current-gallery">

                    </div>
                    <div class="form-item form-item-empty">
                        <div class="buttons">
                            <button class="form-button form-submit" name="save-gallery-content">Save</button>
                            <button class="form-button form-reset" type="reset">Clear Input</button>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $rand; ?>" name="rand-check">
                </form>
            </div>
        </section>
    </main>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Handles rich text -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="./assets/scripts/rich-text.js"></script>

    <script src="../assets/js/file-uploader-single.js"></script>

    <!-- For handling the form gallery (displaying, deletion, addition) -->
    <script src="../assets/js/file-uploader-multiple.js"></script>
    <script src="./assets/scripts/handle-form-gallery.js"></script> 
    <script>

        let currentFiles = "";
        if (`<?php echo "$currentFiles"?>` != ""){    
            currentFiles = JSON.parse(`<?php echo "$currentFiles"?>`);
        }
        
        let currentGallery = document.getElementById("current-gallery");
        if (currentGallery != null){
            displayCurrentImages(currentFiles, currentGallery);
        }

        const setImgSrc = () => {
            $('#img-src').value = $('#form-img').src;
        }
        setImgSrc();

        // Handles redisplaying the description
        setQuill("<?php echo $gallery['description']?>");
    </script>
</body>
</html>