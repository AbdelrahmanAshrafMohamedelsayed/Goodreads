<?php
$connect = mysqli_connect('localhost', 'root', '', 'goodreads');
session_start();
if (isset($_SESSION['handle'])) {
    $bookauthor = addslashes($_SESSION['handle']);
    $authorcur = "SELECT Fname,NumberOfBooks,facebook,twitter,ProfileImage,linkedin,Minit,Lname FROM author  WHERE Handle='$bookauthor'";
    $result = mysqli_query($connect, $authorcur);
    $myauthor = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $img = $myauthor[0]['ProfileImage'];
    $name = $myauthor[0]['Fname'];
    $face = $myauthor[0]['facebook'];
    $linked = $myauthor[0]['linkedin'];
    $twitter = $myauthor[0]['twitter'];
    $NumberOfBooks = $myauthor[0]['NumberOfBooks'];
    $other = "SELECT Fname,NumberOfBooks,ProfileImage,Minit,Lname,facebook,twitter,linkedin FROM author WHERE Handle !='$bookauthor' ";
    $result = mysqli_query($connect, $other);
    $otherauthor = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $type = 'AUTHORS';
} else {
    $user = addslashes($_SESSION['username']);

    $usercur = "SELECT Fname,NumberOfBooks,facebookacc,twitteracc,Image,linkedinacc FROM users  WHERE username='$user'";
    $result = mysqli_query($connect, $usercur);
    $myuser = mysqli_fetch_assoc($result);
    $img = $myuser['Image'];
    $name = $myuser['Fname'];
    $face = $myuser['facebookacc'];
    $linked = $myuser['linkedinacc'];
    $twitter = $myuser['twitteracc'];
    $NumberOfBooks = $myuser['NumberOfBooks'];
    $others = "SELECT Fname,NumberOfBooks,Image,Minit,Lname,facebookacc,twitteracc,linkedinacc FROM users WHERE username !='$user' ";
    $result = mysqli_query($connect, $others);
    $otherauthor = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($otheruser);
    $type = 'USERS';
}
$sql = "SELECT * FROM book ORDER BY Pubdate";
$select = mysqli_query($connect, $sql);
$Books = mysqli_fetch_all($select, MYSQLI_ASSOC);
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
    <!-- <link rel="stylesheet" href="../Adham/formStyle.css"> -->
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="../bookTempStyle.css">
    <style>
        /* .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
        color: rgb(255 255 255);
    } */
        .profile-card-3 {
            font-family: 'Open Sans', Arial, sans-serif;
            position: relative;
            float: left;
            overflow: hidden;
            width: 100%;
            text-align: center;
            height: 368px;
            border: none;
        }

        .profile-card-3 .background-block {
            float: left;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .profile-card-3 .background-block .background {
            width: 100%;
            vertical-align: top;
            opacity: 0.9;
            -webkit-filter: blur(0.5px);
            filter: blur(0.5px);
            -webkit-transform: scale(1.8);
            transform: scale(2.8);
        }

        .profile-card-3 .card-content {
            width: 100%;
            padding: 15px 25px;
            color: #232323;
            float: left;
            background: #efefef;
            height: 50%;
            border-radius: 0 0 5px 5px;
            position: relative;
            z-index: 9999;
        }

        .profile-card-3 .card-content::before {
            content: '';
            background: #efefef;
            width: 120%;
            height: 100%;
            left: 11px;
            bottom: 51px;
            position: absolute;
            z-index: -1;
            transform: rotate(-13deg);
        }

        .profile-card-3 .profile {
            border-radius: 50%;
            position: absolute;
            bottom: 50%;
            left: 50%;
            max-width: 100px;
            opacity: 1;
            box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 255, 255, 1);
            -webkit-transform: translate(-50%, 0%);
            transform: translate(-50%, 0%);
            z-index: 99999;
        }

        .profile-card-3 h2 {
            margin: 0 0 5px;
            font-weight: 600;
            font-size: 120%;
        }

        .profile-card-3 h2 small {
            display: block;
            font-size: 15px;
            margin-top: 10px;
        }

        .profile-card-3 i {
            display: inline-block;
            font-size: 16px;
            color: #232323;
            text-align: center;
            border: 1px solid #232323;
            width: 30px;
            height: 30px;
            line-height: 30px;
            border-radius: 50%;
            margin: 0 5px;
        }

        .profile-card-3 .icon-block {
            float: left;
            width: 100%;
            margin-top: 15px;
        }

        .profile-card-3 .icon-block a {
            text-decoration: none;
        }

        .profile-card-3 i:hover {
            background-color: #232323;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class=" landing  d-flex justify-content-center align-items-start abi">
        <div class="abb">
            <img src="<?php echo htmlspecialchars($img); ?>" class="img-fluid abimg" alt="Cinque Terre" width="200px" height="200px">
            <h3><?php echo htmlspecialchars($name); ?></h3>
            <p class="no-of-books"><?php echo htmlspecialchars($NumberOfBooks); ?> Books</p>
            <div class="social-container row justify-content-center">
                <a href="<?php echo htmlspecialchars($face); ?>" class="social col-3 fc"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo htmlspecialchars($linked); ?>" class="social col-3 in"><i class="fab fa-linkedin-in"></i>
                    <a href="<?php echo htmlspecialchars($twitter); ?>" class="social col-3 tw"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>


    <div class="container mt-2">
        <div class="books row d-flex justify-content-center ">
            <?php $Maxcount = 0;
            foreach ($Books as $i) {
                $Maxcount += 1;
                include '../bookTemp.php';
                if ($Maxcount > 12)
                    break;
            } ?>
        </div>
    </div>
    <div class="fluid vaa py-5 bg-light">
        <div class="container">
            <p class="cf text-center">VIEW OTHER <?php echo $type; ?></p>

            <div class="row d-flex justify-content-center">
                <?php foreach ($otherauthor as $i) { ?>
                    <div class="col-sm-5 col-md-4 col-lg-2 mb-4">
                        <div class="card profile-card-3">
                            <div class="background-block">
                                <img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=650&amp;w=940" alt="profile-sample1" class="background">
                            </div>
                            <div class="profile-thumb-block">
                                <img src="<?php echo (isset($_SESSION['handle'])) ? $i['ProfileImage'] : $i['Image']; ?>" alt="profile-image" class="profile">
                            </div>
                            <div class="card-content">
                                <h2><?php echo $i['Fname'] . " " . $i['Minit'] . "." . $i['Lname']; ?>
                                </h2>
                                <div class="icon-block"><a href="<?php echo (isset($_SESSION['handle'])) ? $i['facebook'] : $i['facebookacc']; ?>"><i class="fab fa-facebook-f"></i></a>
                                    <a href="<?php echo (isset($_SESSION['handle'])) ? $i['twitter'] : $i['twitteracc']; ?>"> <i class="fab fa-twitter"></i></a>
                                    <a href="<?php echo (isset($_SESSION['handle'])) ? $i['linkedin'] : $i['linkedinacc']; ?>">
                                        <i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    </div>

    <!-- js link -->
    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>