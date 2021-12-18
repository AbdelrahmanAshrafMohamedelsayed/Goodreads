<?php
    session_start();
    include "connect.php";
    if(isset($_GET['logout']) AND !empty($_GET['logout']))
    {
        $logout="you have logged out!";
    }
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
    $error="";
    if($_POST['submit']=="sign up")
    {
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $error .="<br /> please enter valid email";
        }
        if(strlen($_POST['password'])<8 or !preg_match("/[A-Z]/",$_POST['password']))
        {
            $error .="<br /> please enter valid password at least from 8 characters and 1 uppercase letter";
        }
        /*if(strlen($error)) 
        {
            echo "<div>there were error/s :".$error."</div>";
        }*/
        else
        {
            if(mysqli_connect_error())
            {
                die ('not working!');    
            }
            $query="select * from users where email='".mysqli_real_escape_string($link,$_POST['email'])."'";
            $result=mysqli_query($link,$query);
            if(mysqli_num_rows($result))
            {
                $error .="<br />this email has used before please enter another email";
            }
            else{
                $query="insert into users (email,password) values('"
                .mysqli_real_escape_string($link,$_POST['email'])."','".md5(md5(mysqli_real_escape_string($link,$_POST['email']))
                .mysqli_real_escape_string($link,$_POST['password']))."')";
                mysqli_query($link,$query);
                $_POST['email']="";
                $_POST['password']="";
                $_SESSION['id']=mysqli_insert_id($link);
                header('Location:FinalDiary.php');
            }
        }
    }
    else if($_POST['submit']=="log in")
    {
        $_POST['loginemail']=filter_var($_POST['loginemail'],FILTER_SANITIZE_EMAIL);
        $_POST['loginpassword']=filter_var($_POST['loginpassword'],FILTER_SANITIZE_STRING);
        $query="select * from users where email='".mysqli_real_escape_string($link,$_POST['loginemail']).
        "' AND password='".md5(md5(mysqli_real_escape_string($link,$_POST['loginemail'])).mysqli_real_escape_string($link,$_POST['loginpassword']))."'";
        $result=mysqli_query($link,$query);
        if(mysqli_num_rows($result))
        {
            $arr=mysqli_fetch_array($result);
            $_SESSION['id']=$arr['id'];
            header('Location:FinalDiary.php');
        }
        else
        {
            $error .="<br />the entered email or password is wrong";
        }  
    }
    }
?>