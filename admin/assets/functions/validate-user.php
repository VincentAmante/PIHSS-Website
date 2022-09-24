<?php
    require_once 'config.php';

    // Handles timed session
    if (!isset($_SESSION['SessionTime'])) {
        $_SESSION['SessionTime'] = time();
    } else if (time() - $_SESSION['SessionTime'] > 1800) {
        // Logs out after 30 mins
        // starts and destroys the session to logout
        session_start();
        session_destroy();
        header("Location: /admin/index.php");
        die();
    } else {
        // Updates on switching pages before 30 mins
        session_regenerate_id(true);
        $_SESSION['SessionTime'] = time();
    }

    // Ensure user is a logged in admin before rendering the rest of the page
    if (!isset($_SESSION['admin-user'])) {
        header("Location: /admin/index.php");
        die();
    } else {
        $user = $_SESSION['admin-user'];
        $checkCredentials = "SELECT * FROM admins WHERE user = '$user'";
        $stmt = $conn->prepare($checkCredentials);
        $stmt->execute();
        $queryResult = mysqli_num_rows($stmt->get_result());
        if ($queryResult < 1) {
            header("Location: index.php");
        } else {
        }
    }
?>