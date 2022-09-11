<?php
    // config.php allows for database connection and other universal variables
    $HOST_URL = $_SERVER['DOCUMENT_ROOT'] . '/';

    function getPathToRoot(){
        $rootDir = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
        
        $rootPath = str_repeat('../', substr_count(substr(getcwd(), strlen($rootDir)), DIRECTORY_SEPARATOR));

        if ($rootPath == '') $rootPath = './';

        return $rootPath;
    }

    $ARTICLE_IMG_DIR = "./assets/article-posts/";
    $GALLERY_FOLDERS_DIR = "./assets/gallery-folders/";
    $GALLERY_THUMBNAILS_DIR = "./assets/gallery-thumbnails/";
    $REG_FORMS_DIR = "./admin/assets/registration-forms/";

    // Output buffering to improve performance
    ob_start();
    session_start();

    // Change these variables depending on the databse
    $host = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "pihss";

    $conn = new mysqli($host, $username, $password, $databaseName);
?>