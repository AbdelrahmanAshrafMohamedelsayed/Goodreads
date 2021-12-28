<?php
session_start();
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
if (isset($_GET['logout']) and !empty($_GET['logout'])) {
    $logout = "you have logged out!";
    session_unset();
    session_destroy();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../connect.php';
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
                header('Location:bookPage.php?book=12345678');
                #header('Location:../abdo hoda/homepage.php');
            }
            $aerrors .= "<br /> This handle already exists";
        }
    } else if (isset($_POST['username'])) {
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['upass']);
        $fname = addslashes($_POST['ufname']);
        $minit = addslashes($_POST['uminit']);
        $lname = addslashes($_POST['ulname']);
        if (checkText($username) == 0 || !preg_match("/@/", $username)||preg_match("/ /", $username)) {
            $uerrors .= "<br /> please enter valid username should contain @ character";
        }
        if (checkText($fname) == 0 || (strlen($minit) != 1) || checkText($lname) == 0) {
            $uerrors .= "<br /> please enter valid name";
        }
        if (checkPassword($password) == 0) {
            $uerrors .= "<br /> please enter valid password at least from 8 characters and 1 uppercase letter";
        }
        if (strlen($uerrors) == 0) {
            $sql = "insert into users (username,fname,minit,lname,password) values
            ('$username','$fname','$minit','$lname','$password')";
            $Insertion = mysqli_query($connect, $sql);
            if ($Insertion) {
                $_SESSION['username'] = $username;
                #header('Location:../abdo hoda/homepage.php');
                header('Location:bookPage.php?book=12345678');
            }
            $uerrors .= "<br /> This username already exists";
        }
    } else if (isset($_POST['username/handle'])) {
        $username_handle = addslashes($_POST['username/handle']);
        $password = addslashes($_POST['password']);
        $sqlAuthor = "SELECT * FROM author WHERE handle='$username_handle' and password='$password'";
        $selectFromAuthors = mysqli_query($connect, $sqlAuthor);
        $data = mysqli_fetch_assoc($selectFromAuthors);
        if ($data) {
            $_SESSION['handle'] = $username_handle;
            #header('Location:../abdo hoda/homepage.php');
            header('Location:bookPage.php?book=12345678');
        }
        $sqlUser = "SELECT * FROM users WHERE username='$username_handle' and password='$password'";
        $selectFromUsers = mysqli_query($connect, $sqlUser);
        $data = mysqli_fetch_assoc($selectFromUsers);
        if ($data) {
            $_SESSION['username'] = $username_handle;
            #header('Location:../abdo hoda/homepage.php');
            header('Location:bookPage.php?book=12345678');
        }
    }
}
