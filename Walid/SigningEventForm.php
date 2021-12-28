<?php
session_start();
$aerrors = "";
$authorHandle = $_SESSION['handle'];

  
function checkText($text)
{
    if (strlen($text) == 0) {
        return 0;
    }
    return 1;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../connect.php';
    
   if (isset($_POST)) {
       $eventTitle = addslashes($_POST['event-title']);
       $eventLocation = addslashes($_POST['event-location']);
       //getOption();
       $bookISBN= $_POST['books'];
       $eventimage=addslashes($_POST['event-image']);
       
        if (checkText($eventTitle) == 0) {
            $aerrors .= "<br /> please enter valid event title";
        }
        else if(!preg_match('/^[a-zA-Z\s]+$/', $eventTitle)){
            $aerrors .= '<br /> Event Title must be letters and spaces only';
        }

        if (checkText($eventLocation) == 0) {
            $aerrors .= "<br /> please enter valid event location";
        }
        else if(!preg_match('/^[a-zA-Z\s]+$/', $eventLocation)){
            $aerrors .= '<br /> Event Location must be letters and spaces only';
        }
    }

    if (strlen($aerrors) == 0) {
        $sql = "insert into signing_event (Title , image) values
        ('$eventTitle', '$eventimage')";
        $Insertion = mysqli_query($connect, $sql);
        if (!$Insertion) {
        $aerrors .= "<br /> Failed to Insert the Event";
        }
        //add image attribute
        $sql = "SELECT ID FROM signing_event WHERE Title = '$eventTitle'";
        $select = mysqli_query($connect, $sql);
        $ids = mysqli_fetch_all($select, MYSQLI_ASSOC);
        $id = $ids[0]['ID'];
        $sql = "insert into author_create_signing_event (Creator, bookIsbn, SE_ID, Clocation) values
        ('$authorHandle', '$bookISBN', $id ,'$eventLocation')";
        
        $Insertion = mysqli_query($connect, $sql);
        if (!$Insertion) {
            $aerrors .= "<br /> Failed to Create Author_Event Relationship";
        }
        //select tag value problem in isbn but id is correct
    }
}
?>
<!DOCTYPE html>
<html lang="en">

                   
              
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Footer/footerStyle.css">
    <link rel="stylesheet" href="../Adham/loginStyle.css">
    <link rel="stylesheet" href="../Adham/formStyle.css">
    <link rel="stylesheet" href="../WebsiteHeader/2headerStyle.css">
    <link rel="stylesheet" href="SigningEvent.css">
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    
    <section class="py-5 d-flex ad-black align-items-center justify-content-center">
        <div class="container w-75 text-center">


            <!-- <div class="container pb-1" style="margin-top: 0;">
                <h1>Book Shop</h1>
                <p class="pb-1 fs-5">Find and read more books you'll love, and keep track of the books you want to read.
                    Be part of the world's largest community of book lovers on Goodreads.</p>
                <p class="fs-6 fw-bold">interested? Sign up now!</p>
            </div> -->
    </section>
    <div class="container d-flex align-items-center justify-content-center ">
        <div class=" row">
            <div class="col"><?php include 'Signing.php' ?></div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php include '../Footer/footer.php' ?>
</body>