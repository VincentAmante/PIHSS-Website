<?php
    include "./assets/functions/header.php";
    $galleryId = $_GET['id'];

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $galleryQuery = $conn->query("SELECT * from galleries WHERE id='$galleryId'");
        $gallery = mysqli_fetch_assoc($galleryQuery);
    }

    // if (isset($_POST['update-article'])){
    //     echo "Update code should run";

    //     $articleTitle = $_POST['article-title'];
    //     $articleCreationDate = $_POST['article-doc'];
    //     // $articleContent = $_POST['article-content'];
        
    //     $updateQuery = $conn->prepare("UPDATE articles 
    //     SET title = '$articleTitle',
    //         creationDate = '$articleCreationDate',
    //         content = '$articleContent'
    //     WHERE id='$articleId'");
    //     $updateQuery->execute();
    // }

    if (!empty($_FILES) 
        && isset($_POST['add-gallery-content'])
        && $gallery != null){

        $images = "";
        $imgCount = 0;
        $imagesValid = true;

        foreach($_FILES['gallery_images']['name'] as $index => $imgName){
            // echo $index . ' : ' . '<b>IMAGE NAME:</b> ' . $imgName .  ' | <b>TEMP NAME:</b> ' . $_FILES['image']['tmp_name'][$index] . '<br>';

            if ($imgName != ""){
                // Directory = Where image will end up when uploaded in the directory
               $imgDirectory = "./assets/gallery-images/" . $gallery['ID'] . '_' . $gallery['title'] . '/';
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
                   if (move_uploaded_file($_FILES['image']['tmp_name'][$index], "../../" . $imgName)){
                       // Img uploaded
                   }
                   else {
                       // Img failed
                       $imagesValid = false;
                   }
               }
           }

            // Adds images to JSON
            if ($imgCount != 0 && $imagesValid){
                $images .= ",
                {
                    imgName: $imgName
                }";
            } else {
                $images .= "
                {
                    imgName: $imgName
                }";
            }
            $imgCount += 1;
        }

        $finalOutput = "
            [
                $images
            ]
        ";

    }
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
            <div class="form-wrapper">
                <form class="article-form" id="article-form" action="<?php echo 'update-gallery.php?id=' . $gallery['ID'];?>" method="POST" enctype="multipart/form-data">
                    <div class="form-item">
                        <label for="gallery-title"><?php echo $gallery['title']?></label>
                    </div>
                    <div class="form-item">
                        <label for="">Upload Image</label>
                        <input type="file" accept="image/*" multiple name="gallery-images[]" id="gallery-images">
                        <!-- <label class="uploader-single" ondragover="return false">
                            <i class="icon-upload icon"></i>
                            <img src="" class="" id="form-img">
                            <input type="file" accept="image/*" name="gallery-image" id="gallery-image" required>
                        </label> -->
                    </div>
                    <div class="form-item form-item-empty">
                        <div class="buttons">
                            <button class="form-button form-submit" name="edit-gallery">Publish</button>
                            <button class="form-button form-reset" type="reset">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <div id="editorjs"></div>
    </main>
    
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/scripts/rich-text.js"></script>
    <script src="../assets/js/file-uploader-single.js"></script>
</body>
</html>