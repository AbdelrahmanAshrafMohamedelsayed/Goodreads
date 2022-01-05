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
        .xunderline
        {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class="fluid bg-light mb-4">
        <div id="data" class="container d-sm-flex justify-content-around align-items-center flex-row-reverse">
            <div class="container bg-light d-flex justify-content-center ">
                <img src="../images/<?php echo $data['bookImage'] ?>" class="m-2" alt="">
            </div>
            <div class="container bg-light">
                <div class="card bg-light" style="border:0px solid black">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $data['title'] ?></h1>
                        <h5 class="card-subtitle mb-2 text-muted"><?php echo $data['BookPH']?></h5>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Price <b class="ms-2"><?php echo $data['price'] ?>$</b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Publisher <b class="ms-2"><a href="Profiles.php?handle=<?php echo $AuthorHandle?>" style="text-decoration:none;" class="card-link"><?php echo $data['BookAuthor'] ?></a> </b></p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Store <b class="ms-2"><?php echo $data['BookStore']?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px"> Publish Date <b class="ms-2"><?php echo $data['Pubdate'] ?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Pages <b class="ms-2"><?php echo $data['numberOfPages'] ?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Copies <b class="ms-2"><?php echo $data['numberOfCopies'] ?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Language <b class="ms-2"><?php echo $data['bookLanguage'] ?></b></p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Rating <b class="ms-2"><?php
                        $n=(int)$bookRating ;
                        for($i=0;$i<$n;$i++)
                         echo "<i class='fas fa-star text-warning'></i>";
                        $n=5-$n;
                        for($i=0;$i<$n;$i++)
                         echo "<i class='far fa-star'></i>";
                         ?></b></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($data['description']){ ?>
    <div class="fluid bg-white">
        <div id="data" class="container">
            <h1>Description: </h1>
            <p><?php echo $data['description'] ?></p>
        </div>
    </div>
    <?php }
     ?>
    <div class="fluid bg-light<?php if(count($reviews)!=0){echo ' py-4';} ?> ">
        <div id="data" class="container">
            <?php if(count($reviews)!=0){ ?>
            <h1>Reviews: </h1>
            <?php
            }
            $count=-1;
            foreach ($reviews as $i) { $count+=1;  ?>
                <div id=<?php echo $count ?> class="card w-75 mx-auto my-4">
                    <a class="card-header card-title h4 xunderline" href="Profiles.php?username=<?php echo $i['URName']; ?>" target="_blank">
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
                        
                    </a>
                    <div class="card-body">
                        <p class="card-text"><?php echo $i['ReviewText']; ?></p>
                        <div class="d-flex justify-content-between ">
                        <div>
                            <?php
                            if(isset($_SESSION['username']))
                            {if(!SelectAction($_SESSION['username'],$username,$i['BOOKISBN'],$i['ID'],$connect,'')){?>
                            <a  href="<?php echo "?book=".$bookISBN."&num=".$count."&like=1 #".$count ?>" class="btn bg-white text-dark"><i class="far fa-thumbs-up"></i><br><?php echo $i['likes'] ?></a>
                            <?php }else { ?>
                            <a  href="<?php echo "?book=".$bookISBN."&num=".$count."&like=0 #".$count ?>" class="btn bg-white text-dark"><i class="fas fa-thumbs-up"></i><br><?php echo $i['likes'] ?></a>
                            <?php }if(!SelectAction($_SESSION['username'],$username,$i['BOOKISBN'],$i['ID'],$connect,'dis')){
                             ?>
                            <a  href="<?php echo "?book=".$bookISBN."&num=".$count."&dislike=1#".$count ?>" class="btn bg-white text-dark"> <i class="far fa-thumbs-down"></i><br><?php echo $i['dislikes'] ?></a>
                            <?php }else { ?>
                            <a  href="<?php echo "?book=".$bookISBN."&num=".$count."&dislike=0#".$count ?>" class="btn bg-white text-dark"> <i class="fas fa-thumbs-down"></i><br><?php echo $i['dislikes'] ?></a>
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
             <form action="bookPage.php?book=<?php echo $bookISBN ?>#button-addon2" method='POST'>
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
    <?php if(isset($_SESSION['username'])){ ?> 
    <div class="fluid bg-white text-center p-3">
        <h1> Rate Book </h1>
        <div id="data" class="container fs-1">
        <form action="bookPage.php?book=<?php echo $bookISBN ?>" method='POST'>
    <fieldset class="rating">
        <input id="demo-1" type="radio" name="demo" value="1"> 
        <label for="demo-1">1 star</label>
        <input id="demo-2" type="radio" name="demo" value="2">
        <label for="demo-2">2 stars</label>
        <input id="demo-3" type="radio" name="demo" value="3">
        <label for="demo-3">3 stars</label>
        <input id="demo-4" type="radio" name="demo" value="4">
        <label for="demo-4">4 stars</label>
        <input id="demo-5" type="radio" name="demo" value="5">
        <label for="demo-5">5 stars</label>
        
        <div class="stars">
            <label for="demo-1" aria-label="1 star" title="1 star"></label>
            <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
            <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
            <label for="demo-4" aria-label="4 stars" title="4 stars"></label>
            <label for="demo-5" aria-label="5 stars" title="5 stars"></label>   
        </div>
        <input type="submit" class="btn text-white bg-main" value="Rate">
        
    </fieldset>
</form>
        </div>
    </div>
    <?php } ?>
    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        (function(){
            var rating = document.querySelector('.rating');
            var handle = document.getElementById('toggle-rating');
            handle.onchange = function(event) {
                rating.classList.toggle('rating', handle.checked);
            };
        }());
    </script>
</body>

</html>