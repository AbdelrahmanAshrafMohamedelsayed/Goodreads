<?php
$_GET['book'] = 12345678;
$bookISBN = $_GET['book'];
session_start();
include 'connect.php';

//book retrival
$sql = "SELECT * FROM book WHERE ISBN=$bookISBN";
$select = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($select);
$handle = $data['BookAuthor'];
//author data
$sql = "SELECT Fname,Minit,Lname FROM author WHERE Handle='$handle'";
$select = mysqli_query($connect, $sql);
$author = mysqli_fetch_assoc($select);
$data['BookAuthor'] = $author['Fname'] . " " . $author['Minit'] . "." . $author['Lname'];

//user data

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['review'])) {
    $username = $_SESSION['username'];
    //review insertion
    $review = addslashes($_POST['review']);
    $sql = "INSERT INTO review (BOOKISBN,URName,ReviewText)
    VALUES ($bookISBN,'$username','$review')";
    $Insertion = mysqli_query($connect, $sql);
}
//reviews retrival
$sql = "SELECT ReviewText,URName FROM review,book WHERE BOOKISBN='$bookISBN' AND ISBN='$bookISBN' ";
$select = mysqli_query($connect, $sql);
$reviews = mysqli_fetch_all($select, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="footerStyle.css">
    <link rel="stylesheet" href="2headerStyle.css">
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
    <?php include '2header.php' ?>
    <div class="fluid bg-light mb-4">
        <div id="data" class="container d-sm-flex justify-content-around align-items-center flex-row-reverse">
            <div class="container bg-light d-flex justify-content-center ">
                <img src="book1.jpeg" alt="">
            </div>
            <div class="container bg-light">
                <div class="card bg-light" style="border:0px solid black">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $data['title'] ?></h1>
                        <h5 class="card-subtitle mb-2 text-muted">Dar Eltaqua</h5>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Price <b><?php echo $data['price'] ?>$</b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Publisher <b><?php echo $data['BookAuthor'] ?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Store <b>Tawfikia</b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px"> Publish Date <b><?php echo $data['Pubdate'] ?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Pages <b><?php echo $data['numberOfPages'] ?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Copies <b><?php echo $data['numberOfCopies'] ?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Language <b><?php echo $data['bookLanguage'] ?></b></p>
                        <a href="#" class="card-link">Author</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fluid bg-white">
        <div id="data" class="container">
            <h1>Description: </h1>
            <p><?php echo $data['description'] ?></p>
        </div>
    </div>
    <div class="fluid bg-light py-4">
        <div id="data" class="container">
            <h1>Reviews: </h1>
            <?php
            foreach ($reviews as $i) { ?>
                <div class="card w-75 mx-auto my-4">
                    <h4 class="card-header card-title">
                        <?php
                        $username=$i['URName'];
                        $sql = "SELECT Fname,Minit,Lname FROM users WHERE Username='$username'";
                        $select = mysqli_query($connect, $sql);
                        $user = mysqli_fetch_assoc($select);
                        $usernameFull = $user['Fname'] . " " . $user['Minit'] . "." . $user['Lname'];
                         echo $usernameFull
                          ?>
                    </h4>
                    <div class="card-body">
                        <p class="card-text"><?php echo $i['ReviewText']; ?></p>
                        <a href="#" class="btn bg-main text-light"><i class="fas fa-thumbs-up"></i></a>
                        <a href="#" class="btn bg-main text-light"><i class="fas fa-thumbs-down"></i></a>
                    </div>
                </div>
            <?php
            }
            ?>
            <?php
            if(isset($_SESSION['username']))
            {
             ?>
             <form action="bookPage.php#button-addon2" method='POST'>
                <div class="input-group w-75 mx-auto">
                    <input type="text" class="form-control" name='review' placeholder="Write Your Review" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" id="button-addon2"><i class="fad fa-location-arrow"></i></button>
                </div>
            </form>
            <?php 
            }
            ?>
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>