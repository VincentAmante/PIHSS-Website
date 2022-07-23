<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/add-article.css">
    <link rel="shortcut icon" href="../assets/images/global/logo_small.png" type="image/x-icon" />
</head>
<body>
<?php include './assets/functions/header.php'?>
    <main>
        <section>
            <div class="form-wrapper">
                <form class="admin-form" id="admin-form" action="./assets/functions/submit-article.php" method="POST" enctype="multipart/form-data">

                    <!-- Title -->
                    <div class="form-item">
                        <label for="article-title">Title</label>
                        <input type="text" id="article-title" name="article-title" spellcheck="false" autocomplete="off" required placeholder="Article Title">
                    </div>

                    <!-- Publishing Date -->
                    <div class="form-item">
                        <label for="article-doc">Publishing Date</label>
                        <input type="date" name="article-doc" required value="<?php echo date("Y-m-d")?>">
                    </div>

                    <!-- Content -->
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
                            <img src="" class="" id="form-img">
                            <input type="file" accept="image/*" name="article-image" id="article-image" required>
                        </label>
                    </div>

                    <!-- Form Buttons -->
                    <div class="form-item form-item-empty">
                        <div class="buttons">
                            <button class="form-button form-submit" name="publish-article">Publish</button>
                            <button class="form-button form-reset" type="reset">Clear</button>
                        </div>
                    </div>
                </form>  <!-- #admin-form -->
            </div> <!-- .form-wrapper -->
        </section>
    </main>
    
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/scripts/rich-text.js"></script>
    <script src="../assets/js/file-uploader-single.js"></script>
</body>
</html>