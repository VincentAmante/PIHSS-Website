<?php
    include "./assets/functions/header.php";
    $articleId = $_GET['id'];

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $articleQuery = $conn->query("SELECT * from articles WHERE id='$articleId'");
        $article = mysqli_fetch_assoc($articleQuery);
        $articleHtml = $article['articleHtml'];
    }

    if (isset($_POST['update-article'])){
        echo "Update code should run";

        $articleTitle = $_POST['article-title'];
        $articleCreationDate = $_POST['article-doc'];
        // $articleContent = $_POST['article-content'];
        
        $updateQuery = $conn->prepare("UPDATE articles 
        SET title = '$articleTitle',
            creationDate = '$articleCreationDate',
            content = '$articleContent'
        WHERE id='$articleId'");
        $updateQuery->execute();
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
</head>
<body>
    <main>
        <div class="form-wrapper">
            <form class="article-form" id="article-form" action="<?php echo 'update-article.php?id=' . $article['ID'];?>" method="POST" enctype="multipart/form-data">
                <div class="form-item">
                    <label for="article-title">Title</label>
                    <input type="text" id="article-title" name="article-title" spellcheck="false" autocomplete="off" required value="<?php echo $article['title']?>">
                </div>
                <div class="form-item">
                    <label for="article-doc">Date of Creation</label>
                    <input type="date" name="article-doc" required value=<?php echo $article['creationDate']?>>
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
                    <label for="articleImg">Article Image</label>
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
    </main>

    
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/scripts/rich-text.js"></script>
    <script>
        setQuill("<?php echo $articleHtml?>");
    </script>
</body>
</html>