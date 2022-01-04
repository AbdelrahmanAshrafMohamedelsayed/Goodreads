<?php
 $connect=mysqli_connect('localhost','root','','goodreads');
 session_start();
 $id=$_GET['ID'];

 $bookstores="SELECT NAME,Location,StoreImage FROM store where ID= $id ";
$result=mysqli_query($connect,$bookstores);
$mystore=mysqli_fetch_assoc($result);
//$x=$mystore[0]['ID'];
//echo $x;
//$bookstore=addslashes($_SESSION['ID']);WHERE BookStore = '$bookstores[0]['ID']'
$sql1="SELECT bookImage, title, price,Fname,Minit,Lname FROM book,author WHERE BookStore = $id AND Handle=BookAuthor";
$result=mysqli_query($connect,$sql1);
$abook=mysqli_fetch_all($result,MYSQLI_ASSOC);
//$sql1="SELECT bookImage, title, price,Fname FROM book,author  WHERE BookAuthor = '$bookauthor' and Handle='$bookauthor'";
//print_r($abook);
// $bookauthor=$abook[0]['BookAuthor'];
// $authorcur="SELECT Fname FROM author,book  WHERE Handle='$bookauthor'";
// $result=mysqli_query($connect,$authorcur);
// $myauthor=mysqli_fetch_all($result,MYSQLI_ASSOC);


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
    <link rel="stylesheet" href="rating.css">
    <link rel="stylesheet" href="homepage.css">

    <style>
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

    .btn-outline-secondary {
        color: #1b8bcb;
        border-color: #1b8bcb;
    }

    .btn-outline-secondary:hover {
        color: #fff;
        background-color: #1b8bcb;
        border-color: #1b8bcb;
    }

    .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
        color: rgb(255 255 255);
    }
    </style>
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class="fluid bg-light">
        <div id="data" class="container d-sm-flex justify-content-around align-items-center flex-row-reverse">
            <div class="container bg-light d-flex justify-content-center ">
                <img src="../images/<?php echo $mystore['StoreImage'] ?>" class="m-2" alt="">
            </div>
            <div class="container bg-light">
                <div class="card bg-light" style="border:0px solid black">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $mystore['NAME'] ?></h1>
                        <h5 class="card-subtitle mb-2 text-muted"><?php echo $mystore['Location'] ?></h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php if (!empty($abook)) {?>
    <div class="author-works mt-0" style="margin-top: 0 !important;">
        <h3 class="text-center black py-3 ">All <?php echo $mystore['NAME'] ?>'s Books</h3>
    </div>
    <?php }?>
    </div>
    <div class="container">
        <div class="books row d-flex justify-content-center ">
            <?php foreach($abook as $pizza){ ?>
            <div class="col-sm col-md-4 col-lg-2 book row justify-content-center bh">
                <img src="../images/<?php echo htmlspecialchars($pizza['bookImage']); ?>" class="img-fluid abimg"
                    alt="Cinque Terre" width="200px" height="200px">
                <div class="pra row justify-content-center">
                    <div class="speech">
                        <p class="title"><?php echo htmlspecialchars($pizza['title']); ?></p>
                        <p class="author-name">
                            <?php echo htmlspecialchars($pizza['Fname']); ?>
                        </p>
                        <p class="price"><?php echo htmlspecialchars($pizza['price']); ?>$</p>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>

    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>


</html>