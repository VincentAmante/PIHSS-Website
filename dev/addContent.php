<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/addContent.css">
</head>
<body>
    <main>
        <div class="form-wrapper">
            <form class="article-form" id="article-form" action="./assets/functions/submitArticle.php" method="POST" enctype="multipart/form-data">
                <div class="form-item">
                    <label for="article-title">Title</label>
                    <input type="text" id="article-title" name="article-title" spellcheck="false" autocomplete="off" required>
                </div>
                <div class="form-item">
                    <label for="article-doc">Date of Creation</label>
                    <input type="date" name="article-doc" required>
                </div>
                <div class="form-item">
                    <label for="article-content">Content</label>
                    <input type="text" id="article-content" name="article-content" spellcheck="false" autocomplete="off" required>
                </div>
                <div class="form-item">
                    <label for="articleImg">Article Image</label>
                        <input type="file" name="article_image" id="article_image" class="image-dropzone" required>   
                    <!-- <label class="file-upload">
                        <div class="upload-button">Add Image</div>
                        <div class="image-drop">Drop image here to add</div>
                    </label> -->
                </div>
                <div class="form-item form-item-empty">
                    <label for="form-submit">Form Buttons</label>
                    <input class="form-button form-submit" type="submit" name="publish-article" value="Publish">
                    <input class="form-button form-reset" type="reset" value="Clear All" required>
                </div>
            </form>
        </div>
    </main>
</body>
</html>