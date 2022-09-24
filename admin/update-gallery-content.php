<?php
    require_once "./assets/functions/header.php";
    $galleryId = $_GET['id'];


    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
        $gallery = mysqli_fetch_assoc($galleryQuery);
        $galleryDir = $GALLERY_FOLDERS_DIR . $gallery['folderName'] . '/';
    }

    require_once './assets/functions/handle-images.php';

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
                    array_push($imgArr, new Image($result->name));
                }
           }
        }

        $finalOutput = json_encode($imgArr);
        $galleryFiles = json_decode($gallery['images']);
        // Handles entries for deletion
        // Locates entries to be deleted, before updating the array
        if (isset($_POST['deletion-entries'])){
            deleteImages($galleryFiles, $_POST['deletion-entries'], $imgDirectory);
        }

        if ($galleryFiles != null){
            $finalOutput = json_encode(array_merge($galleryFiles, $imgArr));
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
    }

    // Edits the gallery's text content
    if (isset($_POST['save-gallery-content'])
    && $_POST['rand-check'] == $_SESSION['rand'] // Form is not submitted on a refresh
    && $galleryId != null){
        $galleryTitle = htmlspecialchars($_POST['gallery-title']);
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
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                    <!-- Title -->
                    <div class="form-item">
                        <label for="gallery-title">Title</label>
                        <input type="text" id="gallery-title" name="gallery-title" spellcheck="false" autocomplete="off" required value="<?php echo $gallery['title']?>">
                    </div>    

                    <!-- Publishing Date -->
                    <div class="form-item">
                        <label for="gallery-doc">Date of Creation</label>
                        <input type="date" name="gallery-doc" required value=<?php echo $gallery['creationDate']?>>
                    </div>

                    <!-- Description -->
                    <div class="form-item">
                        <label for="gallery-content">Description</label>
                        <div>          
                            <input name="input-delta" type="hidden">
                            <input name="input-html" type="hidden">
                            <div class="editor-container" id="editor-container">
                                
                            </div>
                        </div>
                    </div>

                    <!-- Thumbnail -->
                    <!-- <div class="form-item">
                        <label for="">Upload Image</label>
                        <label class="uploader-single" ondragover="return false">
                            <i class="icon-upload icon"></i>
                            <img src="<?php // echo getPathToRoot() . $GALLERY_THUMBNAILS_DIR . $gallery['thumbnail']?>" class="" id="form-img" onchange="setImgSrc();">
                            <input type="file" accept="image/*" name="gallery-thumbnail" id="gallery-thumbnail">
                        </label>
                        
                        <input type="hidden" name="img-src" id="img-src">
                    </div> -->

                    <!-- Gallery -->
                    <div class="form-item" id="gallery-view">
                        <label for="fileElem">Upload images to the gallery</label>
                        <input type="file" 
                            accept="image/*" 
                            multiple name="gallery_images[]" 
                            id="fileElem" 
                            onchange="handleFiles(this.files)">
                    </div>

                    <!-- Image Addition Previews -->
                    <h2>Image Additions</h2>
                    <div class="multiple-file-preview" id="gallery">

                    </div>

                    <!-- Current Images Preview -->
                    <h2>Existing Images</h2>
                    <p>Press image to delete</p>
                    <div class="multiple-file-preview" id="current-gallery">

                    </div>
                    <div class="form-item form-item-empty">
                        <div class="buttons">
                            <button class="form-button form-submit" name="save-gallery-content">Save</button>
                            <button class="form-button form-reset" type="reset">Clear Input</button>
                            <a class="form-button" href="/gallery-subpage.php?id=<?php echo $galleryId?>">View Page</a>
                            <a class="delete-gallery form-button delete-button" href="./manage-pages.php?delete-gallery=<?php echo $galleryId?>">Delete Gallery</a>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $rand; ?>" name="rand-check">
                </form> <!-- #admin-form -->
            </div> <!-- .form-wrapper -->
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
            displayCurrentImages(currentFiles, currentGallery, "<?php echo $galleryDir?>");
        }

        const setImgSrc = () => {
            $('#img-src').value = $('#form-img').src;
        }
        setImgSrc();


        $('.delete-gallery').click(e => {
                // Ensures the click doesn't do anything else
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Once deleted, this gallery cannot be restored',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1B9B55',
                    cancelButtonColor: '#FF1F1F',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed){

                        // If confirmed is press, the window will switch pages
                        // Here it's going to the click's targeted link
                        window.location = e.currentTarget.href;
                    }
                })
            })

        // Handles redisplaying the description
        setQuill("<?php echo $gallery['description']?>");
    </script>
</body>
</html>