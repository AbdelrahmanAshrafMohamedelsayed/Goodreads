<?php

    ob_start();
    include 'EventPage.php';
    include '../connect.php';
    if(isset($_GET['Delete']))
    {
        $ID = $_GET['DeletedID'];
        
        // Procedure for Deleting an Event
        $procedure = "Create PROCEDURE deleteEvent(IN eventID INT) 
        BEGIN
        DELETE FROM signing_event
        where ID = eventID;
        END";

        mysqli_query($connect, $procedure);

        $sql=("CALL deleteEvent($ID)");

        if(mysqli_query($connect, $sql))
        {
            header("Location: EventPage.php");
        }
        else {
            echo 'Failure';
        }
    }
    ob_end_flush();
?>