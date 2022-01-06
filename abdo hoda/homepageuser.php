<?php
  $connect=mysqli_connect('localhost','root','','goodreads');
session_start();
//$_SESSION['Username']='@medo';
$bookuser=addslashes($_SESSION['Username']);
#$sql='SELECT bookImage, title, price FROM book where $bookuser=handle '  WHERE bookuser = $bookuser;
// $sql1="SELECT bookImage, title, price,Fname FROM book,author  WHERE bookuser = '$bookuser' and Handle='$bookuser'";
// $result=mysqli_query($connect,$sql1); 
// $abook=mysqli_fetch_all($result,MYSQLI_ASSOC);
$usercur="SELECT Fname,NumberOfBooks,Image,facebookacc,twitteracc,linkedinacc FROM users WHERE Username='$bookuser'";
$result=mysqli_query($connect,$usercur);
$myuser=mysqli_fetch_all($result,MYSQLI_ASSOC);
// $other="SELECT Fname,NumberOfBooks FROM author WHERE Handle !='$bookuser' ";
// $result=mysqli_query($connect,$other);
// $otherauthor=mysqli_fetch_all($result,MYSQLI_ASSOC);
//print_r($myuser);
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
    <!-- <link rel="stylesheet" href="../Adham/formStyle.css"> -->
    <link rel="stylesheet" href="homepage.css">
    <style>
    /* .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
        color: rgb(255 255 255);
    } */
    </style>
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class=" landing  d-flex justify-content-center align-items-start abi">
        <div class="abb">
            <img src="../images/Lionel_Messi_20180626.jpg" class="img-fluid abimg" alt="Cinque Terre" width="200px"
                height="200px">
            <h3><?php echo htmlspecialchars($myuser[0]['Fname']); ?></h3>
            <p class="no-of-books"><?php echo htmlspecialchars($myuser[0]['NumberOfBooks']); ?> Books</p>
            <!-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta consequuntur pariatur, odio obcaecati
                 hic
                 et ipsa nisi sed voluptates fugit perferendis cupiditate deleniti voluptatum ad consequatur, dolorum
                 libero. Ea molestias accusamus ut
                 cum provident doloribus repudiandae corporis, qui excepturi at.</p> -->
            <div class="social-container row justify-content-center">
                <a href="<?php echo htmlspecialchars($myuser[0]['facebookacc']); ?>" class="social col-3 fc"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="<?php echo htmlspecialchars($myuser[0]['linkedinacc']); ?>" class="social col-3 in"><i
                        class="fab fa-linkedin-in"></i>
                    <a href="<?php echo htmlspecialchars($myuser[0]['twitteracc']); ?>" class="social col-3 tw"><i
                            class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <div class="author-works mb-2">
        <h3 class="text-center black py-5 ">All <?php echo htmlspecialchars($myuser[0]['Fname']); ?>'s Books</h3>
    </div>

    </div>
    <!-- <div class="container">
        <div class="books row d-flex justify-content-center ">
            <?php foreach($abook as $pizza){ ?>
            <div class="col-sm col-md-4 col-lg-2 book row justify-content-center bh">
                <img src="../images/book-1.png" class="img-fluid abimg" alt="Cinque Terre" width="200px"
                    height="200px">
                <div class="pra row justify-content-center">
                    <div class="speech">
                        <p class="title"><?php echo htmlspecialchars($pizza['title']); ?></p>
                        <p class="author-name"><?php echo htmlspecialchars($pizza['Fname']); ?></p>
                        <p class="price"><?php echo htmlspecialchars($pizza['price']); ?>$</p>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div> -->
    <!-- <div class="vaa py-5">
        <div class="container   ">
            <p class="cf text-center">VIEW ANOTHER AUTHORS</p>
            <div class="row d-flex justify-content-center">
                <?php foreach($otherauthor as $pizza){ ?>
                <div class="col-sm col-md-4 col-lg-2 book row justify-content-center m2">
                    <img src="../images/Lionel_Messi_20180626.jpg" alt="" class="img-fluid abimg lio "
                        width="200px" height="200px">
                    <div class="inform my-2 text-center">
                        <h4 class="author-name"><?php echo htmlspecialchars($pizza['Fname']); ?></h4>
                        <p class="number-of-books"><?php echo htmlspecialchars($pizza['NumberOfBooks']); ?> book</p>
                        <a href="" class="viewprofile">VIEW PROFILE</a>
                    </div>

                </div>
                <?php } ?> -->
    <!-- <div class="col-sm col-md-4 col-lg-2 book row justify-content-center m2">
                     <img src="../images/Lionel_Messi_20180626.jpg" alt="" class="img-fluid abimg lio"
                         width="200px" height="200px">
                     <div class="inform my-2 text-center">
                         <h4 class="author-name">author name</h4>
                         <p class="number-of-books">23 book</p>
                         <a href="" class="viewprofile">VIEW PROFILE</a>
                     </div>
                 </div> -->
    <!-- <div class="col-sm col-md-4 col-lg-2 book row justify-content-center m2">
                     <img src="../images/Lionel_Messi_20180626.jpg" alt="" class="img-fluid abimg lio"
                         width="200px" height="200px">
                     <div class="inform my-2 text-center">
                         <h4 class="author-name">author name</h4>
                         <p class="number-of-books">23 book</p>
                         <a href="" class="viewprofile">VIEW PROFILE</a>
                     </div>
                 </div> -->
    </div>
    </div>
    </div>
    </div>
    <!-- js link -->
    <?php include '../Footer/footer.php' ?>

</body>