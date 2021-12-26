<?php
include 'bookPHP.php'
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
    <link rel="stylesheet" href="../Footer/footerStyle.css">
    <link rel="stylesheet" href="../WebsiteHeader/2headerStyle.css">
    <link rel="stylesheet" href="rating.css">
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
                <img src="../images/book1.jpeg" class="m-2" alt="">
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
            $count=-1;
            foreach ($reviews as $i) { $count+=1;  ?>
                <div id=<?php echo $count ?> class="card w-75 mx-auto my-4">
                    <h4 class="card-header card-title">
                        <div>
                        <?php
                        $username=$i['URName'];
                        $sql = "SELECT Fname,Minit,Lname FROM users WHERE Username='$username'";
                        $select = mysqli_query($connect, $sql);
                        $user = mysqli_fetch_assoc($select);
                        $usernameFull = $user['Fname'] . " " . $user['Minit'] . "." . $user['Lname'];
                         echo $usernameFull
                          ?>
                        </div>
                        
                    </h4>
                    <div class="card-body">
                        <p class="card-text"><?php echo $i['ReviewText']; ?></p>
                        <div class="d-flex justify-content-between ">
                        <div>
                            <?php
                            if(isset($_SESSION['username']))
                            {if(!SelectAction($_SESSION['username'],$username,$i['BOOKISBN'],$i['ID'],$connect,'')){?>
                            <a  href="<?php echo"?num=".$count."&like=1 #".$count ?>" class="btn bg-white text-dark"><i class="far fa-thumbs-up"></i><br><?php echo $i['likes'] ?></a>
                            <?php }else { ?>
                            <a  href="<?php echo"?num=".$count."&like=0 #".$count ?>" class="btn bg-white text-dark"><i class="fas fa-thumbs-up"></i><br><?php echo $i['likes'] ?></a>
                            <?php }if(!SelectAction($_SESSION['username'],$username,$i['BOOKISBN'],$i['ID'],$connect,'dis')){
                             ?>
                            <a  href="<?php echo"?num=".$count."&dislike=1#".$count ?>" class="btn bg-white text-dark"> <i class="far fa-thumbs-down"></i><br><?php echo $i['dislikes'] ?></a>
                            <?php }else { ?>
                            <a  href="<?php echo"?num=".$count."&dislike=0#".$count ?>" class="btn bg-white text-dark"> <i class="fas fa-thumbs-down"></i><br><?php echo $i['dislikes'] ?></a>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="fs-6 pt-1 d-flex align-items-end" style="color:#888;">
                            <?php
                            echo $i['DateOfReview'];
                             ?>
                        </div>
                        </div>  
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
    <div class="fluid bg-white text-center p-3">
        <h1> Rate Book </h1>
        <div id="data" class="container fs-1">
        <?php include 'rating.php' ?>
        </div>
    </div>
    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>