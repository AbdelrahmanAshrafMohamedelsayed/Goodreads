<?php 
include '../connect.php';
session_start();
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
$name="";
$eq="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $_SESSION["error"]="";
    if(isset($_POST['username']))
    {
        $name="username";
        $username = addslashes($_POST['username']);
        $image = "../images/".addslashes($_POST['image']);
        $fname = addslashes($_POST['fname']);
        $facebook = addslashes($_POST['Facebook']);
        $linkedin = addslashes($_POST['Linkedin']);
        $twitter = addslashes($_POST['Twitter']);
        $lname = addslashes($_POST['lname']);
        $Nationality=addslashes($_POST['Nationality']);
        if (checkText($username) == 0||preg_match("/ /", $username)||!preg_match("/@/", $username)) {
            $_SESSION["error"] .= "<br /> please enter valid handle";
        }
        if (checkText($fname) == 0 ||  checkText($lname) == 0) {
            $_SESSION["error"] .= "<br /> please enter valid name";
        }
        if (strlen($_SESSION["error"]) == 0) {
            echo $username ;
            echo $_SESSION['username'];
            $sql = "UPDATE users 
            SET Fname='$fname',
            Lname='$lname',
            Username='$username',
            Image='$image',
            facebookacc='$facebook',
            twitteracc='$twitter',
            linkedinacc='$linkedin',
            Nationality='$Nationality' 
            WHERE Username='".$_SESSION['username']."' ;";
            echo $sql;
            $test = mysqli_query($connect, $sql);
            if ($test)
            {
                echo 1;
                $_SESSION['username'] = $username;
                $eq=$username;
            }
            else{
                $_SESSION["error"] .= "<br /> This username already exists";
                $eq=$_SESSION['username'];
            }
        }
        $eq=$_SESSION['username'];
    }
    else if(isset($_POST['handle']))
    {
        $name="handle";
        $handle = addslashes($_POST['handle']);
        $image = "../images/".addslashes($_POST['image']);
        $fname = addslashes($_POST['fname']);
        $facebook = addslashes($_POST['Facebook']);
        $linkedin = addslashes($_POST['Linkedin']);
        $twitter = addslashes($_POST['Twitter']);
        $lname = addslashes($_POST['lname']);
        $Nationality=addslashes($_POST['Nationality']);
        if (checkText($handle) == 0||preg_match("/ /", $handle)) {
            $_SESSION["error"] .= "<br /> please enter valid handle";
        }
        if (checkText($fname) == 0 ||  checkText($lname) == 0) {
            $_SESSION["error"] .= "<br /> please enter valid name";
        }
        if (strlen($_SESSION["error"]) == 0) {
            $sql = "UPDATE  author
            SET Handle='$handle' ,
            ProfileImage ='$image' ,
            Fname='$fname' ,
            Lname='$lname' ,
            Nationality='$Nationality' ,
            facebook='$facebook' ,
            twitter='$twitter' ,
            linkedin='$linkedin' 
            WHERE Handle='".$_SESSION['handle']."' ;";
            $update = mysqli_query($connect, $sql);
            if ($update) {
                $_SESSION['handle'] = $handle;
                $eq=$handle;
            }
            else{
                $_SESSION["error"] .= "<br /> This handle already exists";
                $eq=$_SESSION['handle'];
            }
        }
        $eq=$_SESSION['handle'];
    }
}
header("Location:Profiles.php?$name=$eq");
?>
