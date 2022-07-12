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
             // Directory = Where image will end up when uploaded in the directory
            $imgDirectory = "./assets/article-posts/";
            $imgType = pathinfo($imgName, PATHINFO_EXTENSION);
            $imgName = $imgDirectory . uniqid() .basename($imgName);

            if($_FILES['article-image']['size'] > 10000000000){
                echo "FILE TOO LARGE";
                $imgValid = false;
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
                $imgValid = false;
            }


            if ($imgValid){
                if (move_uploaded_file($_FILES['article-image']['tmp_name'], "../../" . $imgName)){
                    // Img uploaded
                }
                else {
                    // Img failed
                    $imgValid = false;
                    exit();
                }
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