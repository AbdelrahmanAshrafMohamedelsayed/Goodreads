<?php
include "loginPagePHP.php";
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
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="stylesheet" href="formStyle.css">
    <style>
        .upbutton {
            position: absolute;
            right: 10px;
            top: 10px;
            height: 0;
            color: #1B8554;
        }

        .upbutton:hover {
            color: #1B8554;
        }

    </style>
</head>

<body>
    <div class="fluid">
        <nav class="navbar navbar-expand-md navbar-dark bg-main">
            <div class="container text-light">
                <a href="#" class="navbar-brand fs-3"><i class="fal fa-book  me-1"></i> GOODREADS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <form class="d-md-flex ms-auto" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
                        <input class="form-control me-2 my-1" type="text" placeholder="Username/Handle" aria-label="Search" name='username/handle' value=
                        "<?php
                        if(isset($username_handle))
                        {
                            echo $username_handle;
                        }
                         ?>">
                        <input class="form-control me-2 my-1" type="password" placeholder="Password" aria-label="Search" name='password' 
                        value="<?php
                        if(isset($username_handle))
                        {
                            echo $password;
                        }
                         ?>">
                        <button class="btn btn-outline-light text-white my-1 ad-log" type="submit" name='submit' value='log in'>Log&nbsp;In</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <section class="py-5 d-flex ad-black align-items-center justify-content-center">
        <div class="container w-75 text-center">
            <div class="container pb-1" style="margin-top: 0;">
                <h1>Book Shop</h1>
                <p class="pb-1 fs-5">Find and read more books you'll love, and keep track of the books you want to read. Be part of the world's largest community of book lovers on Goodreads.</p>
                <p class="fs-6 fw-bold">interested? Sign up now!</p>
            </div>
            <?php
            if(isset($username_handle))
            {
             ?>
             <div class="alert alert-danger" role="alert">
                Invalid username/handle or password
            </div>
            <?php
            }
             ?>
            <?php
                if(isset($logout) AND strlen($logout))
                {
                ?>
                <div class="container">
                    <div class="alert alert-success" role="alert">
                        <?php
                        echo $logout;
                        $logout="";
                        unset($_GET['logout']);
                         ?>
                    </div>
                </div>
                 <?php
                }
                ?>
            
        </div>
    </section>
    <div class="container">
        <div class="row mx-auto">
            <div class="col-md-6 p-4"><?php include 'AuthorForm.php' ?></div>
            <div class="col-md-6 p-4"><?php include 'userForm.php' ?></div>
        </div>

    </div>
    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>