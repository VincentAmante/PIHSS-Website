<?php
    // config.php allows for database connection and other universal variables
    $HOST_URL = $_SERVER['DOCUMENT_ROOT'] . '/';

    function getPathToRoot(){
        $rootDir = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
        
        $rootPath = str_repeat('../', substr_count(substr(getcwd(), strlen($rootDir)), DIRECTORY_SEPARATOR));

        if ($rootPath == '') $rootPath = './';

        return $rootPath;
    }

    // Output buffering to improve performance
    ob_start();
    session_start();

    // ! Maybe best to move these to an env file or somewhere safer
 
    $ARTICLE_IMG_DIR = "./assets/article-posts/";
    $GALLERY_FOLDERS_DIR = "./assets/gallery-folders/";
    $GALLERY_THUMBNAILS_DIR = "./assets/gallery-thumbnails/";
    $REG_FORMS_DIR = "./admin/assets/registration-forms/";

    // Change these variables depending on the databse
    $CONFIG_HOST = "localhost";
    $CONFIG_USERNAME = "root";
    $CONFIG_PASSWORD = "";
    $CONFIG_DATABASE_NAME = "pihss";

    $conn = new mysqli($CONFIG_HOST, $CONFIG_USERNAME, $CONFIG_PASSWORD, $CONFIG_DATABASE_NAME);
?>