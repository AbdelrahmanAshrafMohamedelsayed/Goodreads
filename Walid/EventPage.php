<?php
include 'SigningEvent.php'
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

        .EventImage {
         width: 75%;

        }
        .card-img-top {
            padding-top: 20px;
        }
    </style>

</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class="fluid bg-light mb-4">
        <div class="container">
            <div class="row">
                <?php foreach ($eventData as $event) { ?>
                <!-- <div class="card mb-3 col-md-6"> -->
                    <div class="my-auto bg-light card mb-3 col-md-6">
                        <img src= " ../images/<?php echo $event['image']?>" class="card-img-top  EventImage my-auto" alt="No Image Available">
                        
                        <div class="card-body my-auto">
                            <h5 class="card-title"><?php echo $event['Title']; ?></h5>
                            <p class="card-text">Author: <b><?php echo $event['Fname']?> 
                            <?php echo $event['Minit']?>  <?php echo $event['Lname']?> </b> </p>
                            <p class="card-text" >Book to be Signed: <b><?php echo $event['title']?></b></p>
                            <p class="card-text"><small class="text-muted">Publish Date: <b><?php echo $event['Creation_date'] ?></b></small></p>
                        </div>
                    </div>
                <!-- </div>      -->
                <?php } ?>
            </div>
        </div>
    </div>
     <div class="card mb-3 col-md-6 d-column-flex align-items-center"> 
                        <img src= " ../images/<?php echo $event['image']?>" class="card-img-top  EventImage my-auto" alt="No Image Available">
                        
                <div class="card-body my-auto d-column-flex align-items-start">
                            <h5 class="card-title"><?php echo $event['Title']; ?></h5>
                            <p class="card-text">Author: <b><?php echo $event['Fname']?> 
                            <?php echo $event['Minit']?>  <?php echo $event['Lname']?> </b> </p>
                            <p class="card-text" >Book to be Signed: <b><?php echo $event['title']?></b></p>
                            <p class="card-text"><small class="text-muted">Publish Date: <b><?php echo $event['Creation_date'] ?></b></small></p>
                </div>
        </div>     
</body>
        
        