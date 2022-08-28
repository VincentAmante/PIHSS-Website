<?php
    include "./assets/functions/header.php";
    $articleId = $_GET['id'];

    // Connects to Database, fetches article data
    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $articleQuery = "SELECT * from articles WHERE id='$articleId'";
        $stmt = $conn->prepare($articleQuery);
        $stmt->execute();
        $article = mysqli_fetch_assoc($stmt->get_result());
        $articleHtml = $article['articleHtml'];
    }

    if (isset($_POST['update-article'])){

        // Fetches form contents
        $articleTitle = $_POST['article-title'];
        $articleCreationDate = $_POST['article-doc'];
        $articleContent = $_POST['input-html'];

        /// Handle Image Changes
        $imgName = $_FILES['article-image']['name'];  
        $origImgSrc = $_POST['img-src'];  

        // Changes image if the thumbnails are not the same
        if ($imgName != "" 
        && ('../' . $imgName != $origImgSrc)){
            $imgValid = true;

            include "./assets/functions/handle-images.php";
            $imgDirectory = "./assets/article-posts/";
            $result = uploadImage($imgDirectory, $imgName, 'article-image', -1);

            // Uploads new image, and deletes old one
            if ($result != false){
                $imgName = $result;
                unlink('../' . $article['img']);

                $updateQuery = $conn->prepare("UPDATE articles 
                SET img = '$imgName'
                WHERE id='$articleId'");
                $updateQuery->execute();
            }
        }

        // Updates text content
        $updateQuery = $conn->prepare("UPDATE articles 
        SET title = '$articleTitle',
            creationDate = '$articleCreationDate',
            articleHtml = '$articleContent'
        WHERE id='$articleId'");
        $updateQuery->execute();

        // Resets query
        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $articleQuery = "SELECT * from articles WHERE id='$articleId'";
            $stmt = $conn->prepare($articleQuery);
            $stmt->execute();
            $article = mysqli_fetch_assoc($stmt->get_result());
            $articleHtml = $article['articleHtml'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/add-article.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
        if (isset($_GET['result'])){
            $result = $_GET['result'];

            if ($result == 'success'){
                ?>
                <script>
                    Swal.fire({
                    title: 'Article Created!',
                    text: "View article?",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Go To Article',
                    cancelButtonText: 'Stay here'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/news-article.php?id=<?php echo $articleId?>'; 
                    }
                    })
                </script>
                <?php
            }
        }
    ?>
    <main>
        <div class="form-wrapper">
            <form class="admin-form" id="admin-form" action="<?php echo 'update-article.php?id=' . $article['ID'];?>" method="POST" enctype="multipart/form-data">
                
                <!-- Title -->
                <div class="form-item">
                    <label for="article-title">Title</label>
                    <input type="text" id="article-title" name="article-title" spellcheck="false" autocomplete="off" required value="<?php echo $article['title']?>">
                </div>

                <!-- Publishing Date -->
                <div class="form-item">
                    <label for="article-doc">Date of Creation</label>
                    <input type="date" name="article-doc" required value="<?php echo $article['creationDate']?>">
                </div>

                <!-- Article Content -->
                <div class="form-item">
                    <label for="article-content">Content</label>
                    <div>          
                        <input name="input-delta" type="hidden">
                        <input name="input-html" type="hidden">
                        <div class="editor-container" id="editor-container">
                            
                        </div>
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="form-item">
                    <label for="">Upload Image</label>
                    <label class="uploader-single" ondragover="return false">
                        <i class="icon-upload icon"></i>
                        <img src="<?php echo '../' . $article['img']?>" class="" id="form-img" onchange="setImgSrc();">
                        <input type="file" accept="image/*" name="article-image" id="article-image">
                    </label>
                    
                    <input type="hidden" name="img-src" id="img-src">
                </div>

                <!-- Form Buttons -->
                <div class="form-item form-item-empty">
                    <label for="form-submit">Form Buttons</label>
                    <div class="buttons">
                        <button class="form-button form-submit" name="update-article">Publish</button>
                        <button class="form-button form-reset" type="reset" value="Clear All" required>Clear</button>
                    </div>
                </div>
            </form> <!-- #admin-form -->
        </div> <!-- .form-wrapper -->
    </main>

    
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/scripts/rich-text.js"></script>
    <script src="../assets/js/file-uploader-single.js"></script>
    <script>
        const setImgSrc = () => {
            $('#img-src').value = $('#form-img').src;
        }
        setImgSrc();

        setQuill("<?php echo $articleHtml?>");
    </script>
</body>
</html>