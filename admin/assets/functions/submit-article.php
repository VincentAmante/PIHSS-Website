<?php
    if (isset($_POST['publish-article'])){
        require "connect.php";

        $articleTitle = $_POST['article-title'];
        $articleCreationDate = $_POST['article-doc'];
        $articleHtml = $_POST['input-html'];

        // IMAGE HANDLING
        $imgValid = true;
        $imgName = $_FILES['article-image']['name'];    

        if ($imgName != ""){
            include "./handle-images.php";
             // Directory = Where image will end up when uploaded in the directory
            $imgDirectory = "./assets/article-posts/";

            $result = uploadImage($imgDirectory, $imgName, 'article-image', -1, true);
            var_dump($result);

            if ($result != false){
                $imgName = $result;
            } else {
                exit();
            }
        }

        if ($imgValid){
            if ($conn->connect_error){
                die('Connection Failure : ' + $conn->connect_error);
            } else {
                $stmt = $conn->prepare("INSERT INTO articles(title, creationDate, articleHtml, img) VALUES('$articleTitle','$articleCreationDate', '$articleHtml', '$imgName')");
                $stmt->execute();
                $stmt->close();
                $conn->close();
            }
    
            // Returns to page
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }
    }
?>