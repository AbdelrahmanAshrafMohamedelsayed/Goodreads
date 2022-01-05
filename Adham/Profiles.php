<?php
include 'profilePHP.php';
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
    <link rel="stylesheet" href="../Adham/bookTempStyle.css">
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

        .proimage {
            border: 1px solid #fff;
            border-radius: 50%;
            width: 30%;
        }

        .frow a i:hover {
            color: #1b8bcb;
        }

        .update-btn:hover {
            background-color: var(--bolder);
        }
    </style>
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class="fluid bg-light pb-4">
        <div id="data" class="container d-sm-flex justify-content-around align-items-center">
            <div class="container bg-light d-flex justify-content-center ">
                <img src="<?php echo $image; ?>" class="proimage m-2" alt="">
            </div>
            <div class="container bg-light">
                <div class="card bg-light" style="border:0px solid black">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $data['Fname'] . " " . $data['Minit'] . "." . $data['Lname']; ?></h3>
                        <h5 class="card-subtitle mb-2 text-muted">
                            <?php
                            if (isset($handle)) {
                                echo $handle;
                            } else if (isset($username)) {
                                echo $username;
                            }
                            ?>
                        </h5>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Nationality <b class="ms-2"><?php echo $data['Nationality']; ?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Number of books <b class="ms-2"><?php echo count($books) ?></b> </p>
                        <?php if (isset($handle)) { ?>
                            <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Rating <b class="ms-2"><?php
                                                                                                                                $n = (int)$AuthorRating;
                                                                                                                                for ($i = 0; $i < $n; $i++)
                                                                                                                                    echo "<i class='fas fa-star'></i>";
                                                                                                                                $n = 5 - $n;
                                                                                                                                for ($i = 0; $i < $n; $i++)
                                                                                                                                    echo "<i class='far fa-star'></i>";
                                                                                                                                ?></b> </p>
                        <?php } ?>
                        <h6 class="card-subtitle my-2">Follow <?php echo $data['Fname'] ?></h6>
                        <div class="row w-25 frow">
                            <div class="col-4">
                                <a class="text-dark" href="<?php echo $facebook; ?>" target="blank"> <i class="fab fa-facebook "></i></a>
                            </div>
                            <div class="col-4">
                                <a class="text-dark" href="<?php echo $twitter; ?>" target="blank"><i class="fab fa-twitter "></i></a>
                            </div>
                            <div class="col-4">
                                <a class="text-dark" href="<?php echo $linkedin; ?>" target="blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($bio) && strlen($bio) != 0) { ?>
        <div class="fluid bg-white py-5">
            <div id="" class="container">
                <h4>About The Author: </h4>
                <p><?php echo $bio ?></p>
            </div>
        </div>
    <?php }
    if (count($books) != 0) {
    ?>
        <div class="fluid bg-white py-5">
            <div class="container">
            <div class="row d-flex justify-content-center ">
                <?php 
                foreach ($books as $i) {
                    include '../Adham/bookTemp.php';
                } ?>
            </div>
            </div>
        </div>
    <?php
    }
    function to_know(&$test, &$ok)
    {
        if (isset($test))
            $ok = $test;
    }
    $myuser = 0;
    $profileowner = 0;
    to_know($_SESSION['handle'], $myuser);
    to_know($_SESSION['username'], $myuser);
    to_know($handle, $profileowner);
    to_know($username, $profileowner);
    if ($profileowner == $myuser) {
    ?>
        <div class="fluid bg-light p-5">
            <div id="" class="container">
                <form class="row g-3 w-75 mx-auto" action="ProfilesHelp.php" method="POST">
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">First name</label>
                        <input type="text" class="form-control" id="validationDefault01" name="fname" value="<?php echo $data['Fname'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="validationDefault02" name="lname" value="<?php echo $data['Lname'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">
                            <?php if (isset($handle))
                                echo "Handle";
                            else
                                echo "Username";
                            ?>
                        </label>
                        <div class="input-group">
                            <?php if (isset($username)) { ?>
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            <?php } ?>
                            <input type="text" class="form-control" id="validationDefaultUsername" name="<?php
                                                                                                            if (isset($handle))
                                                                                                                echo "handle";
                                                                                                            else
                                                                                                                echo "username";
                                                                                                            ?>" aria-describedby="inputGroupPrepend2" value="<?php
                                                                                                                                                                if (isset($username))
                                                                                                                                                                    echo $username;
                                                                                                                                                                else
                                                                                                                                                                    echo $handle;                                                                                                                                   ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="formFile" class="form-label">Profile Image</label>
                        <input class="form-control" type="file" id="formFile" name="image" value="<?php echo $image ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Nationality</label>
                        <input type="text" class="form-control" id="validationDefault05" name="Nationality" value="<?php echo $data['Nationality'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control pass" id="validationDefault05" name="password" value="<?php echo $data['Password'] ?>">
                            <span class="input-group-text" id="inputGroupPrepend2"><i class="test far fa-eye"></i></span>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="validationDefault05" name="Facebook" value="<?php echo $facebook ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Twitter</label>
                        <input type="text" class="form-control" id="validationDefault05" name="Twitter" value="<?php echo $twitter ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Linkedin</label>
                        <input type="text" class="form-control" id="validationDefault05" name="Linkedin" value="<?php echo $linkedin ?>">
                    </div>
                    <?php if (isset($_SESSION['handle'])) { ?>
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-text">Bio</span>
                                <textarea class="form-control" aria-label="With textarea" name="bio"><?php echo $bio; ?></textarea>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">
                                Confirm Updating
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="update-btn btn btn-primary text-white bg-main" type="submit">Update Info</button>
                    </div>
                    <?php if (isset($_SESSION["error"]) && strlen($_SESSION["error"]) != 0) { ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?php echo "there were error/s :" . $_SESSION["error"];
                                $_SESSION["error"] = "";
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION['username']) && isset($handle)) { ?>
        <div class="fluid bg-white text-center p-3">
            <h1> Rate Author </h1>
            <div id="data" class="container fs-1">
                <form action="Profiles.php?handle=<?php echo $handle ?>" method='POST'>
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
        let see = document.querySelector('.test');
        let pass = document.querySelector('.pass');
        console.log(see);
        see.addEventListener('click', () => {
            console.log(see.className);
            if (see.className.indexOf('slash') == -1) {
                see.className += "-slash";
                pass.type = 'text';
            } else {
                see.className = "test far fa-eye";
                pass.type = 'password';
            }
        })
    </script>
</body>

</html>