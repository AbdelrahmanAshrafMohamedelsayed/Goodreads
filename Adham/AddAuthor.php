<?php
session_start();
include '../connect.php';
$aerrors = "";
$uerrors = "";
$errors = "";
function checkText($text)
{
    if (strlen($text) == 0) {
        return 0;
    }
    return 1;
}
function checkPassword($pass)
{
    if (strlen($pass) < 8  || !(preg_match("/[A-Z]/", $pass))) {
        return 0;
    }
    return 1;
}
if (isset($_POST['handle'])) {
    $handle = addslashes($_POST['handle']);
    $password = addslashes($_POST['apass']);
    $fname = addslashes($_POST['afname']);
    $minit = addslashes($_POST['aminit']);
    $lname = addslashes($_POST['alast']);
    if (checkText($handle) == 0||preg_match("/ /", $handle)) {
        $aerrors .= "<br /> please enter valid handle";
    }
    if (checkText($fname) == 0 || (strlen($minit) != 1) || checkText($lname) == 0) {
        $aerrors .= "<br /> please enter valid name";
    }
    if (checkPassword($password) == 0) {
        $aerrors .= "<br /> please enter valid password at least from 8 characters and 1 uppercase letter";
    }
    if (strlen($aerrors) == 0) {
        $sql = "insert into author (handle,fname,minit,lname,password) values
        ('$handle','$fname','$minit','$lname','$password')";
        $Insertion = mysqli_query($connect, $sql);
        if ($Insertion) {
            $_SESSION['handle'] = $handle;
            header('Location:../abdo hoda/authors.php');
            #header('Location:../Adham/loginPage.php');
        }
        else{

            $aerrors .= "<br /> This handle already exists";
        }
    }
}
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
    <link rel="stylesheet" href="../Adham/loginStyle.css">
    <link rel="stylesheet" href="../Adham/formStyle.css">
    <link rel="stylesheet" href="../WebsiteHeader/2headerStyle.css">
</head>

<body>
    <?php include '../WebsiteHeader/2header.php' ?>
    <div class="d-flex justify-content-center">
            <div class="col-md-6 my-5"><?php include '../Adham/AuthorForm.php' ?></div> 
    </div>
    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>