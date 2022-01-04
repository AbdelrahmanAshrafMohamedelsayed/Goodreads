<?php

    ob_start();
    include 'EventPage.php';
    include '../connect.php';
    if(isset($_GET['Delete']))
    {
        $ID = $_GET['DeletedID'];
        // $sql = "SELECT Handle, ISBN FROM signing_event,author_create_signing_event,book, author
        // where SE_ID = $ID
        // and ISBN = bookIsbn 
        // and Handle = Creator;";
        // $select = mysqli_query($connect, $sql);
        // $DeleteInfo = mysqli_fetch_all($select, MYSQLI_ASSOC);

        // $Handle = $DeleteInfo[0]['Handle'];
        // $ISBN = $DeleteInfo[0]['ISBN'];

        // echo $Handle.'   ';
        // echo $ISBN;

        $sql = "DELETE FROM signing_event
        where ID = $ID";

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