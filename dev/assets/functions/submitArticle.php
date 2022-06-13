<?php

    // if (isset($_POST['publish-article'])){
        // Server Stuff idk
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $databasename = 'pihss';

        $articleTitle = $_POST['article-title'];
        $articleCreationDate = $_POST['article-doc'];
        $articleContent = $_POST['article-content'];

        // IMAGE HANDLING
        $imgValid = true;
        $imgName = $_FILES['article_image']['name'];
        if ($imgName == null){
            exit();
        }
        echo $imgName;

        if ($imgName != ""){
             // Directory = Where image will end up when uploaded in the directory
            $imgDirectory = "assets/article-posts/";
            $imgType = pathinfo($imgName, PATHINFO_EXTENSION);
            $imgName = $imgDirectory . uniqid() .basename($imgName);

            if($_FILES['article_image']['size'] > 10000000000){
                echo "FILE TOO LARGE";
                $imgValid = false;
            }

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
                if (move_uploaded_file($_FILES['article_image']['tmp_name'], $imgName)){
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
            $conn = new mysqli($hostname, $username, '', $databasename);

            if ($conn->connect_error){
                die('Connection Failure : ' + $conn->connect_error);
            } else {
                $stmt = $conn->prepare("INSERT INTO articles(title,creationDate,content,img) VALUES('$articleTitle','$articleCreationDate','$articleContent', '$imgName')");
                $stmt->execute();
                echo "article is submitted";
                $stmt->close();
                $conn->close();
            }
        
            // Returns to page
            $referer = $_SERVER['HTTP_REFERER'];
            header("Location: $referer");
        }

    // }
?>