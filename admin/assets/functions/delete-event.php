<?php
    require "config.php";
    require_once "validate-user.php";

    if ($conn->connect_error) {
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $id = $_POST['id'];
        $deleteQuery = "DELETE from events WHERE id=?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
?>