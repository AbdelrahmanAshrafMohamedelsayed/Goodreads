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
            border-radius: 20px;
            border: 1px solid #000
        }
        .card {
            padding-top: 5px;
            border-radius: 20px;
            border: 1px solid #167db8;
        }
        .ab{
        border-radius: 20px;
        border: 1px solid #167db8;
        background-color: #167db8;
        color: #FFFFFF;
        float: right;
        position: relative;
        bottom: 2rem;
        }
        .ab:hover {
            transform: scale(1.1);
        }
        .book-link {
            text-decoration: none;
            color: #1b8bcb;
        }
        .book-link:hover {
            color: #167db8 ;
        }
        .cont {
            height: auto;
        }
        .card {
            height: 35rem;
        }
    </style>

</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class="bg-light mb-4">
        <div class="container">
            <div class="row">
                <?php foreach ($eventData as $event) { ?>
                    <?php $currDate = date("Y-m-d"); ?>
                    <?php if($event['Creation_date']<$currDate) {
                            $ID = $event['ID'];
                            $sql=("CALL deleteEvent($ID)"); 
                            mysqli_query($connect, $sql); }
                    ?>
                    <div class="my-auto bg-light card mb-3 col-md-6">
                        <img src= "../images/<?php echo $event['image']?>" class="card-img-top  EventImage my-auto" alt="No Image Available">
                        
                        <div class="card-body my-auto">
                            <h5 class="card-title"><?php echo $event['Title']; ?></h5>
                            <p class="card-text">Author: <b><?php echo $event['Fname']?> 
                            <?php echo $event['Minit']?>  <?php echo $event['Lname']?> </b> </p>
                            
                            <p class="card-text">Book to be signed: <b><a class= "book-link" href= "../Adham/bookPage.php?book=<?php echo $event['ISBN']?>">
                            <?php echo $event['title']?> </a></b> </p>
                            <p class="card-text">Location: <b><?php echo $event['Clocation'] ?></b></p>
                          
                            <p class="card-text">Date to be Held: <b><?php echo $event['Creation_date']?></b></p>
                            
                        </div>
                         <!-- Sending ID to be deleted -->
                         <?php if($event['Handle']==$_SESSION['handle']) {?>
                            <form action="DeleteEvent.php?id=<?php echo $event['ID']?>" method="GET">
                                <input type="hidden" name = "DeletedID" value = "<?php echo $event['ID']?>">
                                <input class="ab btn-lg active" type="submit" value="Delete Event" name="Delete">
                            </form>
                        <?php } else {?>

                            <br>
                            <br>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
        
        