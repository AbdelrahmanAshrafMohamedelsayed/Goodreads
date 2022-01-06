<?php
session_start();
$berrors = "";

//check if empty
function checkText($text)
{
    if (strlen($text) == 0) {
        return 0;
    }
    return 1;
}
//check if empty

//check if it is numercal
function int_validate($text)
{
    if (strlen($text) == 0) {
        return 0;
    }
        if(preg_match('/^([0-9]*)$/', $text)){
            return 1;
        }
        else{
            return 0;
        }
}
//check if it is numercal

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     include '../connect.php';
    if (isset($_POST)) {
        $storename = addslashes($_POST['store-name']);
        $storelocation = addslashes($_POST['store-location']);
        $storeimage=addslashes($_POST['store-image']);
        if (checkText($storename) == 0) {
            $berrors .= "<br /> please enter valid Store Name";
        }
   
        if (checkText($storelocation) == 0) {
            $berrors .= "<br /> please enter valid book Store Location";
        }
      
         if (strlen($berrors) == 0) {

             //insert store
            $sql = "insert into store (NAME,Location,StoreImage) values
            ('$storename','$storelocation','$storeimage')";
            $Insertion = mysqli_query($connect, $sql);
             //insert store
            if (!$Insertion) {
            $berrors .= "<br /> Failed to Insert";
            }
            else{
                header('location:bookstoresall.php');
            }
        }
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
    <link rel="stylesheet" href="../WebsiteHeader/2headerStyle.css">
    <link rel="stylesheet" href="../Adham/formStyle.css">
    <link rel="stylesheet" href="publish.css">
    <style>
    .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
        color: rgb(255 255 255);
    }
    </style>
</head>

<body>

    <?php include '/xampp/htdocs/Goodreads-master/2header.php' ?>

    <?php include '../WebsiteHeader/2header.php' ?>
    <section class="py-5 d-flex ad-black align-items-center justify-content-center">
        <div class="container w-75 text-center">

    </section>
    <div class="container d-flex align-items-center justify-content-center ">
        <div class=" row">
            <div class="col"><?php include 'bookstore.php' ?></div>
            <br>
        </div>
    </div>

    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>