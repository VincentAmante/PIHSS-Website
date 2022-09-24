<?php
    if (isset($_POST['publish-article'])){
        require_once "config.php";
        require_once "validate-user.php";

        $articleTitle = htmlspecialchars($_POST['article-title']);
        $articleCreationDate = htmlspecialchars($_POST['article-doc']);
        $articleHtml = $_POST['input-html'];

        // Attempt image upload
        $imgName = $_FILES['article-image']['name'];
        if ($imgName != ""){
            require_once "./handle-images.php";
            $result = uploadImage($ARTICLE_IMG_DIR, $imgName, 'article-image', -1);

            if ($result->isUploaded){
                $imgName = $result->name;
            } else { 
                exit();
            }
        } else {
            exit();
        }

        if ($result->isUploaded){
            $lastId = "";

            if ($conn->connect_error){
                die('Connection Failure : ' + $conn->connect_error);
            } else {
                $stmt = $conn->prepare("INSERT INTO articles(title, creationDate, articleHtml, img) 
                    VALUES('$articleTitle','$articleCreationDate', '$articleHtml', '$imgName')");
                $stmt->execute();
                
                $lastId = mysqli_insert_id($conn);
                $stmt->close();
                $conn->close();
            }
    
            header("Location: ../../update-article.php?id=" . $lastId . '&result=success');
        }
    }

    $conn->close();
?>