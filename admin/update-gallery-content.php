<?php
    include "./assets/functions/header.php";
    $galleryId = $_GET['id'];

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
        $gallery = mysqli_fetch_assoc($galleryQuery);
    }

    // Class for storing image types
    class Image {
        public $path;
        public $description; // For when alt text is implemented
        function __construct($path)
        {
            $this->path = $path;
        }
    };

    $imgArr = array();

    // UPLOADS IMAGE CONTENTS
    if (!empty($_FILES) 
        && isset($_POST['save-gallery-content'])
        && $_POST['rand-check'] == $_SESSION['rand']
        && $galleryId != null){

        // Verifies images first
        $images = "";
        $imgCount = 0;
        $imagesValid = true;
        $finalOutput = " ";

        
        foreach($_FILES['gallery_images']['name'] as $index => $imgName){
            // echo $index . ' : ' . '<b>IMAGE NAME:</b> ' . $imgName .  ' | <b>TEMP NAME:</b> ' . $_FILES['image']['tmp_name'][$index] . '<br>';

            if ($imgName != ""){
                // Directory = Where image will end up when uploaded in the directory
               $imgDirectory = "./assets/gallery-folders/" . $gallery['ID'] . '_' . $gallery['title'] . '/';
               $imgType = pathinfo($imgName, PATHINFO_EXTENSION);
               $imgName = $imgDirectory . uniqid() .basename($imgName);
   
               if($_FILES['gallery_images']['size'][$index] > 10000000000){
                   echo "FILE TOO LARGE";
                   $imagesValid = false;
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
                   $imagesValid = false;
               }
   
               if ($imagesValid){
                   if (move_uploaded_file($_FILES['gallery_images']['tmp_name'][$index], $imgName)){
                    
                        // Image uploaded, move to new image array
                        $newImg = new Image($imgName);
                        array_push($imgArr, $newImg);
                   }
                   else {
                       // Img failed
                       $imagesValid = false;
                   }
               }
           }
        }


        $finalOutput = json_encode($imgArr);
        $galleryFiles = json_decode($gallery['images']);

        // Handles entries for deletion
        // Locates entries to be deleted, before updating the array
        if (isset($_POST['deletion-entries'])){
            $deletionEntries = $_POST['deletion-entries'];
            foreach ($deletionEntries as $deletionIndex => $entry) {
                foreach ($galleryFiles as $galleryIndex => $record){
                    $imgPath = get_object_vars($record)['path'];
                    if ($imgPath == $entry){
                        array_splice($galleryFiles, $galleryIndex, 1);
                        // Deletes image from folder
                        if (unlink($imgPath)){
                            // Deletion successful
                        }
                        else {
                            echo 'File not deleted';
                        }
                    }
                }
            }
        }

        if ($galleryFiles != null){
            $finalOutput = json_encode(array_merge($galleryFiles, $imgArr));
        }

        $updateQuery = $conn->prepare("
                UPDATE galleries
                SET images = '$finalOutput'
                WHERE id='$galleryId'
        ");
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

    $currentFiles = $gallery['images'];
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
                        <label for="gallery-title"><?php echo $gallery['title']?></label>
                    </div>
                    <div class="form-item">
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
    <script src="../assets/js/file-uploader-multiple.js"></script>
    <script>
        let currentFiles = JSON.parse(`<?php echo "$currentFiles"?>`);
        let currentGallery = document.getElementById("current-gallery");
        for (let i = 0; i < currentFiles.length; i++){
            let img = document.createElement('img');
            let div = document.createElement('div');
            
            div.className = "img-preview-container";
            img.src = currentFiles[i]['path'];
            div.setAttribute('id', 'img-container-' + i);
            div.appendChild(img);
            div.setAttribute('onclick', 'deleteEntry(' + i + ')');

            currentGallery.appendChild(div)
        }

        function deleteEntry(i){
            let deleteInput = document.createElement('input');
            deleteInput.setAttribute('type', 'hidden');
            deleteInput.setAttribute('value', currentFiles[i]['path']);
            deleteInput.setAttribute('name', 'deletion-entries[]');

            document.getElementById('admin-form').appendChild(deleteInput);
            document.getElementById('img-container-' + i).remove();
        }
    </script>
</body>
</html>