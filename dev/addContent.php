<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./addContent.css">
</head>
<body>
    <main>
        <div class="form-wrapper">
            <form class="article-form" id="article-form" action="./submitArticle.php" method="POST">
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
                <div class="form-item form-item-empty">
                    <label for="form-submit">Form Buttons</label>
                    <input class="form-button form-submit" type="submit" value="Submit">
                    <input class="form-button form-reset" type="reset" value="Clear All" required>
                </div>
            </form>
        </div>
    </main>
</body>
</html>