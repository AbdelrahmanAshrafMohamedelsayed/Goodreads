<?php

    ob_start();
    include 'bookstoresall.php';
    include '../connect.php';
    if(isset($_GET['Delete']))
    {
        $ID = $_GET['DeletedID'];
     
        // procedure delete
        $procedure = "  
           CREATE PROCEDURE deleteStore(IN store_id int(10))  
           BEGIN   
           DELETE FROM store WHERE ID = store_id;  
           END;  
           ";  
               // procedure delete
        if(mysqli_query($connect,  "DROP PROCEDURE IF EXISTS deleteStore"))
        {
            if(mysqli_query($connect, $procedure))  
            {  
                 $query = "CALL deleteStore('".$_GET['DeletedID']."')";  
                 mysqli_query($connect, $query);  
                 echo 'Data Deleted';  
                 header("Location: bookstoresall.php");
            } 
            else {
                echo 'Failure';
            }
            
        }
     
    }
    ob_end_flush();
?>