<?php
    include '../admin/assets/functions/config.php';

    if ($conn->connect_error) {
        die('Connection Failure : ' + $conn->connect_error);
    } else {
        $events = array();

        $eventsQuery = $conn->query("SELECT * from events");    

        while ($event = $eventsQuery->fetch_assoc()){
            $eventObj = (object) 
                array('id'=> $event['ID'],
                    'title' => $event['title'], 
                    'startDate' => $event['startDate'], 
                    'endDate' => $event['endDate']);

            array_push($events, $eventObj);
        }

        $eventsList = json_encode($events);
    }
?>