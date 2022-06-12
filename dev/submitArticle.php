<?php
    // Server Stuff idk
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $databasename = 'pihss';

    $articleTitle = $_POST['article-title'];
    $articleCreationDate = $_POST['article-doc'];
    $articleContent = $_POST['article-content'];

    $conn = new mysqli($hostname, $username, '', $databasename);

    if ($conn->connect_error){
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO articles(title,creationDate,content) VALUES('$articleTitle','$articleCreationDate','$articleContent')");
        $stmt->execute();
        echo "article is submitted";
        $stmt->close();
        $conn->close();
    }

    // Returns to page
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
?>