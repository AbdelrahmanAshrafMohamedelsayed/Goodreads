<?php
session_start();
$berrors = "";

function checkText($text)
{
    if (strlen($text) == 0) {
        return 0;
    }
    return 1;
}
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     include '../connect.php';
    if (isset($_POST)) {
        $booktitle = addslashes($_POST['book-title']);
        $bookisbn = addslashes($_POST['book-isbn']);
        $bookprice = addslashes($_POST['book-price']);
        $bookNOAC = addslashes($_POST['book-NOAC']);
        $bookdescription = addslashes(trim($_POST['book-description']));
        $bookstore = addslashes($_POST['book-store']);
        $bookph = addslashes($_POST['book-ph']);
        $booknop = addslashes($_POST['book-nop']);
        $booklanguage = addslashes($_POST['book-language']);
        $bookimage=addslashes($_POST['book-image']);
      //  $bookstore=addslashes($_POST['book-store']);
     // $_SESSION['handle']='@body';
        $bookauthor=addslashes($_SESSION['handle']);
        $check = getimagesize($_FILES["book-image"]["tmp_name"]);
       // echo $bookauthor;
       if($check == false) {
        $berrors .= "<br /> please enter valid book image";

       }
     
        if (checkText($booktitle) == 0) {
            $berrors .= "<br /> please enter valid book title";
        }
        else if(!preg_match('/^[a-zA-Z\s]+$/', $booktitle)){
            $berrors .= '<br /> Book Title must be letters and spaces only';
        }
        if (!int_validate( $bookisbn)) {
            $berrors .= "<br /> please enter valid book isbn";
        }
        if (!int_validate( $bookprice)) {
            $berrors .= "<br /> please enter valid book price";
        }
        if (!int_validate( $bookNOAC)) {
            $berrors .= "<br /> please enter valid number of copies";
        }
        if (checkText($bookdescription) == "") {
            $berrors .= "<br /> please enter valid book description";
        }
        if(preg_match('/^([0-9]*)$/', $bookdescription)){
            $berrors .= "<br /> please enter valid book description";
        }
        if (checkText($bookstore) == 0) {
            $berrors .= "<br /> please enter valid book store";
        }
       else if (!int_validate( $bookstore)) {
            $berrors .= "<br /> please enter valid number of pages";
        }
        
        if (checkText($bookph) == 0) {
            $berrors .= "<br /> please enter valid book store";
        }
       else if (!int_validate( $bookph)) {
            $berrors .= "<br /> please enter valid number of pages";
        }
        if (!int_validate( $booknop)) {
            $berrors .= "<br /> please enter valid number of pages";
        }
        //
        if (checkText($booklanguage) == 0) {
            $berrors .= "<br /> please enter valid book publish language";
        }
        else if(!preg_match('/^[a-zA-Z\s]+$/', $booklanguage)){
            $berrors .= '<br /> publish language must be letters and spaces only';
        }
        // if ($_FILES['book-image']['size'] == 0 && $_FILES['book-image']['error'] == 0)
        // {
        //     $berrors .= "<br /> please enter valid book image";
            
        // }
        
         if (strlen($berrors) == 0) {
            $sql = "insert into book (ISBN,title,price,numberOfCopies,bookLanguage,description,bookImage,BookAuthor,BookStore,numberOfPages,BookPH) values
        ('$bookisbn','$booktitle','$bookprice','$bookNOAC','$booklanguage','$bookdescription','$bookimage','$bookauthor','$bookstore','$booknop','$bookph')";
            $Insertion = mysqli_query($connect, $sql);
            if (!$Insertion) {
            $berrors .= "<br /> Failed isbn Insert";
               
            }
            else{
                $sql2="UPDATE author SET NumberOfBooks = NumberOfBooks+1 where Handle= '$bookauthor'";
                $Insertion2 = mysqli_query($connect, $sql2);
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
    <link rel="stylesheet" href="../abdo hoda/publish.css">
    <style>
    .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
        color: rgb(255 255 255);
    }
    </style>
</head>

<body>
    <!--
        error
        <?php include '/xampp/htdocs/Goodreads-master/2header.php' ?>
    -->
    <?php include '../WebsiteHeader/2header.php' ?>
    <section class="py-5 d-flex ad-black align-items-center justify-content-center">
        <div class="container w-75 text-center">
            <div class="container pb-1" style="margin-top: 0;">
                <h1>Publish Book</h1>

            </div>
    </section>
    <div class="container d-flex align-items-center justify-content-center ">
        <div class=" row">
            <div class="col"><?php include 'publish.php' ?></div>
        </div>
    </div>

    <?php include '../Footer/footer.php' ?>
</body>