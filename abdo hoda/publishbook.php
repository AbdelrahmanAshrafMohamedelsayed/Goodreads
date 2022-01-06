<?php
session_start();
$berrors = "";

//validate empty
function checkText($text)
{
    if (strlen($text) == 0) {
        return 0;
    }
    return 1;
}
//validate empty

//validate numerical
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
//validate numerical


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     include '../connect.php';
    if (isset($_POST)) {
        $booktitle = addslashes($_POST['book-title']);
        $bookisbn = addslashes($_POST['book-isbn']);
        $bookprice = addslashes($_POST['book-price']);
        $bookNOAC = addslashes($_POST['book-NOAC']);
        $bookdescription = addslashes(trim($_POST['book-description']));
        $bookstore = $_POST['book-store'];
        $bookph = $_POST['book-ph'];
        $booknop = addslashes($_POST['book-nop']);
        $booklanguage = addslashes($_POST['book-language']);
        $bookimage=addslashes($_POST['book-image']);
        $bookauthor=addslashes($_SESSION['handle']);
        if (checkText($booktitle) == 0) {
            $berrors .= "<br /> please enter valid book title";
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
        
   
        if (!int_validate( $booknop)) {
            $berrors .= "<br /> please enter valid number of pages";
        }
        //
        if (checkText($booklanguage) == 0) {
            $berrors .= "<br /> please enter valid book language";
        }
        else if(!preg_match('/^[a-zA-Z\s]+$/', $booklanguage)){
            $berrors .= '<br /> book language must be letters and spaces only';
        }
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
                header("location:../Adham/bookPage.php?book=$bookisbn");
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
    <br>
    <br>
    <br>
    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>