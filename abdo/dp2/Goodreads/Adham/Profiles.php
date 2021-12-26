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

        .proimage {
            border: 1px solid #fff;
            border-radius: 50%;
            width: 30%;
        }
    </style>
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class="fluid bg-light mb-4">
        <div id="data" class="container d-sm-flex justify-content-around align-items-center">
            <div class="container bg-light d-flex justify-content-center ">
                <img src="https://picsum.photos/300" class="proimage m-2" alt="">
            </div>
            <div class="container bg-light">
                <div class="card bg-light" style="border:0px solid black">
                    <div class="card-body">
                        <h3 class="card-title">Ahmed Mohamed Hamza</h3>
                        <h5 class="card-subtitle mb-2 text-muted">@adhamali</h5>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Nationality <b><?php echo "Canadian" ?></b> </p>
                        <p class="card-text" style="font-size: 1.08rem!important; margin-bottom:3px">Number of books <b>16</b> </p>
                        <div class="row w-25">
                            <div class="col-4">
                                <a class="text-dark" href="https://www.facebook.com/profile.php?id=100009982989915" target="blank"> <i class="fab fa-facebook "></i></a>
                            </div>
                            <div class="col-4">
                                <a class="text-dark" href="https://twitter.com/AdhamAliHasan?t=qF9os7jH_FgyLljMpWe0Fw&s=09" target="blank"><i class="fab fa-twitter "></i></a>
                            </div>
                            <div class="col-4">
                                <a class="text-dark" href="https://www.facebook.com/profile.php?id=100009982989915" target="blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fluid bg-white mb-5">
        <div id="" class="container">
            <h4>About The Author: </h4>
            <p><?php echo "Font Awesome 6's third beta release is out now!Try out the Free version of v6 Beta. Subscribe to Font Awesome Pro to get even more!" ?> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente quod dolorum, placeat est aliquam quidem explicabo facilis reprehenderit cumque, suscipit libero cum in beatae sequi hic necessitatibus expedita, blanditiis vitae adipisci exercitationem autem consequuntur. Placeat, distinctio soluta sed magni dolor, modi ex velit saepe explicabo, maiores nihil repellendus pariatur nisi! Aperiam, voluptas! Repudiandae illo recusandae odio tenetur sunt dignissimos perferendis quas earum. Id, fugiat? Nam tempora perspiciatis a! Vel suscipit officiis molestiae architecto, facere error veritatis dicta praesentium, sed ullam consectetur eius! Accusantium at nostrum omnis labore nisi aperiam, in voluptates deserunt architecto, minus quod minima error? Ipsam, quas quidem!</p>
        </div>
    </div>
    <div class="fluid bg-light p-5">
        <div id="" class="container">
            <form class="row g-3 w-75 mx-auto">
                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label">First name</label>
                    <input type="text" class="form-control" id="validationDefault01" value="" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="validationDefault02" value="" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefaultUsername" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="formFile" class="form-label">Profile Image</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="col-md-4">
                    <label for="validationDefault05" class="form-label">Facebook</label>
                    <input type="text" class="form-control" id="validationDefault05" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault05" class="form-label">Twitter</label>
                    <input type="text" class="form-control" id="validationDefault05" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault05" class="form-label">linkedin</label>
                    <input type="text" class="form-control" id="validationDefault05" required>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                            Confirm Updating
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Update Info</button>
                </div>
            </form>
        </div>
    </div>


    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>