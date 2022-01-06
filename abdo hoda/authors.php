<?php
  $connect=mysqli_connect('localhost','root','','goodreads');
//   retrieve all authors
$other="SELECT Fname,NumberOfBooks,ProfileImage,Minit,Lname,facebook,twitter,linkedin,handle FROM author";
$result=mysqli_query($connect,$other);
$otherauthor=mysqli_fetch_all($result,MYSQLI_ASSOC);
//   retrieve all authors
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
    <div class="vaa py-5 bg-light">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <?php foreach($otherauthor as $i){ ?>
                <div class="col-sm-5 col-md-4 col-lg-2 mb-3">
                    <div class="card profile-card-3">
                        <div class="background-block">
                            <img src="https://images.pexels.com/photos/459225/pexels-photo-459225.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=650&amp;w=940"
                                alt="profile-sample1" class="background">
                        </div>
                        <div class="profile-thumb-block">
                            <img src="../images/<?php echo $i['ProfileImage'] ?>" alt="profile-image" class="profile">
                        </div>
                        <div class="card-content">
                            <a style="text-decoration: none; color:black;"
                                href="../Adham/Profiles.php?handle=<?php echo $i['handle'];  ?>">
                                <h2><?php echo $i['Fname'] . " " . $i['Minit'] . "." . $i['Lname']; ?>
                                </h2>
                            </a>

                            <div class="icon-block"><a href="<?php echo $i['facebook']?>"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="<?php echo $i['twitter'] ?>"> <i class="fab fa-twitter"></i></a>
                                <a href="<?php echo $i['linkedin']; ?>">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>