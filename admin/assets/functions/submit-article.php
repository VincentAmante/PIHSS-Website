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
            $last_id = "";

            if ($conn->connect_error){
                die('Connection Failure : ' + $conn->connect_error);
            } else {
                $stmt = $conn->prepare("INSERT INTO articles(title, creationDate, articleHtml, img) VALUES('$articleTitle','$articleCreationDate', '$articleHtml', '$imgName')");
                $stmt->execute();
                
                $last_id = mysqli_insert_id($conn);
                $stmt->close();
                $conn->close();
            }
    
            header("Location: ../../update-article.php?id=" . $last_id);
        }
    }

    $conn->close();
?>