<?php
    if (isset($_POST['add-event'])){
        require "connect.php";

        $eventTitle = $_POST['event-title'];
        $eventStartDate = $_POST['start-date'];
        $eventEndDate = $_POST['end-date'];

        if ($conn->connect_error){
            die('Connection Failure : ' + $conn->connect_error);
        } else {
            $addEventQuery = "INSERT INTO events(title, startDate, endDate) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($addEventQuery);
            $stmt->bind_param('sss', $eventTitle, $eventStartDate, $eventEndDate);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
        
        header("Location: ../../manage-events.php");
    }
?>