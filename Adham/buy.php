<?php
session_start();
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error="";
    $card = $_POST['card'];
    $sec = $_POST['sec'];
    $buyer = $_SESSION['username'];
    $book = $_GET['book'];
    $sql = "INSERT INTO buy(BookISBN,buyer) VALUES('$book','$buyer')";
    $insertion = mysqli_query($connect, $sql);
    if (!$insertion) {
        $error .= "<br /> Invalid Data";
        echo $error;
    } else {
        header("location:Profiles.php?username=$buyer");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../Footer/footerStyle.css">
    <link rel="stylesheet" href="../WebsiteHeader/2headerStyle.css">
    <link rel="stylesheet" href="formStyle.css">
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class="fluid bg-light py-5">
        <div class="container">
            <div class="container">
                <div class="abcontainer" id="abcontainer">

                    <div class="form-abcontainer sign-in-abcontainer">
                        <form action="buy.php?book=<?php echo $_GET['book'] ?>" method='POST' class="abform row">
                            <h1 class="headf">Buy <?php echo $_GET['book'] ?></h1>

                            <input type="text" placeholder="Visa Card" name="card" class="col" value="<?php
                                                                                                        if (isset($card)) {
                                                                                                            echo $card;
                                                                                                        }
                                                                                                        ?>">
                            <input type="password" placeholder="Security Key" class="col" name='sec' value="<?php
                                                                                                            if (isset($sec)) {
                                                                                                                echo $sec;
                                                                                                            }
                                                                                                            ?>">


                            <br>
                            <?php
                            if (isset($error) and strlen($error) != 0) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo "there were error/s :" . $error ?>
                                </div>
                            <?php }
                            ?>

                            <button class="ab btn-lg active">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>