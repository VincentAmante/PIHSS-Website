<?php
    include './assets/functions/header.php'
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
</head>
<body>
    <main>
        <div class="form-wrapper">
            <form class="article-form" id="article-form" action="./assets/functions/submit-article.php" method="POST" enctype="multipart/form-data">
                <div class="form-item">
                    <label for="article-title">Title</label>
                    <input type="text" id="article-title" name="article-title" spellcheck="false" autocomplete="off" required placeholder="Article Title">
                </div>
                <div class="form-item">
                    <label for="article-doc">Publishing Date</label>
                    <input type="date" name="article-doc" required value="<?php echo date("Y-m-d")?>" readonly>
                </div>
                <div class="form-item">
                    <label for="article-content">Content</label>
                    <div>
                        <input name="input-delta" type="hidden">
                        <input name="input-html" type="hidden">
                        <div class="editor-container" id="editor-container">
                        </div>                
                    </div>
                </div>
                <div class="form-item">
                    <label for="article_image">Article Image</label>
                        <input type="file" name="article_image" id="article_image" class="image-dropzone" required>
                </div>
                <div class="form-item form-item-empty">
                    <label for="form-submit">Form Buttons</label>
                    <div class="buttons">
                        <button class="form-button form-submit" name="publish-article">Publish</button>
                        <button class="form-button form-reset" type="reset" value="Clear All" required>Clear</button>
                    </div>
                </div>
            </form>

        </div>

        <div id="editorjs"></div>
    </main>
    
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/scripts/rich-text.js"></script>
</body>
</html>