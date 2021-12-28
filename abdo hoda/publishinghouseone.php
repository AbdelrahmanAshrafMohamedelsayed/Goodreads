<?php
include '../connect.php';
 
 session_start();
$id=$_SESSION['ID'];

 $PublishHouses="SELECT NAME,Address,Publishing_house_Image FROM publishing_house where ID= $id ";
$result=mysqli_query($connect,$PublishHouses);
$MyPublishHouse=mysqli_fetch_assoc($result);

$sql1="SELECT bookImage, title, price,Fname FROM book,author WHERE BookPH = $id AND Handle=BookAuthor";
$result=mysqli_query($connect,$sql1);
$abook=mysqli_fetch_all($result,MYSQLI_ASSOC);


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
    <div class="fluid bg-light mb-4">
        <div id="data" class="container d-sm-flex justify-content-around align-items-center flex-row-reverse">
            <div class="container bg-light d-flex justify-content-center ">
                <img src="../images/<?php echo $MyPublishHouse['Publishing_house_Image'] ?>" class="m-2" alt="">
            </div>
            <div class="container bg-light">
                <div class="card bg-light" style="border:0px solid black">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $MyPublishHouse['NAME'] ?></h1>
                        <h5 class="card-subtitle mb-2 text-muted"><?php echo $MyPublishHouse['Address'] ?></h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="author-works mt-0" style="margin-top: 0 !important;">
        <h3 class="text-center black py-3 ">All <?php echo $MyPublishHouse['NAME'] ?>'s Books</h3>
    </div>

    </div>
    <div class="container">
        <div class="books row d-flex justify-content-center ">
            <?php foreach($abook as $MyPublishHouse){ ?>
            <div class="col-sm col-md-4 col-lg-2 book row justify-content-center bh">
                <img src="../images/<?php echo htmlspecialchars($MyPublishHouse['bookImage']); ?>" class="img-fluid abimg"
                    alt="Cinque Terre" width="200px" height="200px">
                <div class="pra row justify-content-center">
                    <div class="speech">
                        <p class="title"><?php echo htmlspecialchars($MyPublishHouse['title']); ?></p>
                        <p class="author-name">
                            <?php echo htmlspecialchars($MyPublishHouse['Fname']); ?>
                        </p>
                        <p class="price"><?php echo htmlspecialchars($MyPublishHouses['price']); ?>$</p>
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