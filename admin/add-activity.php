<?php
    include "./assets/functions/header.php";

    $galleryId = "";
    $galleryTitle = "";

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {

    }

    // FUNCTIONALLY, galleries are just activities but with an image limit

    // Edits the gallery's text content
    if (isset($_POST['add-gallery'])
    && $_POST['rand-check'] == $_SESSION['rand'] // Form is not submitted on a refresh
    ){
        $galleryTitle = $_POST['gallery-title'];
        $galleryCreationDate = $_POST['gallery-creation-date'];
        $galleryContent = $_POST['input-html'];
        $isTrue = true;
        
        $updateQuery = $conn->prepare("INSERT INTO galleries(title, creationDate, description, isActivity) 
        VALUES('$galleryTitle', '$galleryCreationDate', '$galleryContent', 
        '1')");
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
        && $galleryId != null){
        include './assets/functions/image-class.php';
        include './assets/functions/handle-images.php';

        // Verifies images first
        $imagesValid = true;
        $finalOutput = " ";
        $imgArr = array();

        $imgDirectory = "./assets/gallery-folders/" . $galleryId . '_' . $galleryTitle . '/';
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
        // Handles entries for deletion
        // Locates entries to be deleted, before updating the array
        if (isset($_POST['deletion-entries'])){
            deleteImages($galleryFiles, $_POST['deletion-entries']);
        }

        $updateQuery = $conn->prepare("UPDATE galleries SET images = '$finalOutput' WHERE id='$galleryId'");
        $updateQuery->execute();

        // Repeats query to match update
        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
            $gallery = mysqli_fetch_assoc($galleryQuery);
        }
        unset($_POST);
    }

    // $currentFiles = $gallery['images'];
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
            <form class="admin-form" id="admin-form" action="./add-activity.php" method="POST" enctype="multipart/form-data">
            <?php // Prevents resubmission on refresh
            $rand = rand();
            $_SESSION['rand'] = $rand;?>
                <div class="form-item">
                    <label for="gallery-title">Activity Title</label>
                    <input type="text" id="gallery-title" name="gallery-title" spellcheck="false" autocomplete="off" required placeholder="Gallery Title">
                </div>
                <div class="form-item">
                    <label for="gallery-creation-date">Publishing Date</label>
                    <input type="date" name="gallery-creation-date" required value="<?php echo date("Y-m-d")?>">
                </div>
                <div class="form-item">
                    <label for="gallery-description">Description</label>
                    <div>
                        <input name="input-delta" type="hidden">
                        <input name="input-html" type="hidden">
                        <div class="editor-container" id="editor-container">
                        </div>                
                    </div>
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
                <input type="hidden" name="is-activity" value="true">
                <div class="form-item form-item-empty">
                    <div class="buttons">
                        <button class="form-button form-submit" name="add-gallery">Publish</button>
                        <button class="form-button form-reset" type="reset">Clear</button>
                    </div>
                </div>
                <input type="hidden" value="<?php echo $rand; ?>" name="rand-check">
            </form>
        </div>
        </section>
    </main>
    
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/scripts/rich-text.js"></script>

    <!-- For handling the form gallery (displaying, deletion, addition) -->
    <script src="../assets/js/file-uploader-multiple.js"></script>
    <script src="./assets/scripts/handle-form-gallery.js"></script> 
    <script>
        // Handles gallery
        let currentFiles = JSON.parse(`<?php echo "$currentFiles"?>`);
        let currentGallery = document.getElementById("current-gallery");
        if (currentGallery != null){
            displayCurrentImages(currentFiles, currentGallery);
        }

        // Handles redisplaying the description
        setQuill("<?php echo $gallery['description']?>");
    </script>
</body>
</html>