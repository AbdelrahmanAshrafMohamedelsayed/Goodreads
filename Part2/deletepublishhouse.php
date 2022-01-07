<?php

    ob_start();
    include 'publishhouseall.php';
    include '../connect.php';
    if(isset($_GET['Delete']))
    {
           // procedure delete
           $procedure = "  
           CREATE PROCEDURE deletepublishhouse(IN publishhouse_id int(10))  
           BEGIN   
           DELETE FROM publishing_house WHERE ID = publishhouse_id;  
           END;  
           ";  
               // procedure delete
        if(mysqli_query($connect,  "DROP PROCEDURE IF EXISTS deletepublishhouse"))
        {
            if(mysqli_query($connect, $procedure))  
            {  
                 $query = "CALL deletepublishhouse('".$_GET['DeletedID']."')";  
                 mysqli_query($connect, $query);  
                 echo 'Data Deleted';  
                 header("Location: publishhouseall.php");
            } 
            else {
                echo 'Failure';
            }
            
        }
    }
    ob_end_flush();
?>