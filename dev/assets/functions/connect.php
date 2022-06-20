<?php
    // connect.php allows for database connection

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