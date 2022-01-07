<?php
session_start();
include '../imageUpload.php';
$perrors = "";

function checkText($text)
{
    if (strlen($text) == 0) {
        return 0;
    }
    return 1;
}
function int_validate($text)
{
    if (strlen($text) == 0) {
        return 0;
    }
        if(preg_match('/^([0-9]*)$/', $text)){
            return 1;
        }
        else{
            return 0;
        }
    
  
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
   include '../connect.php';
    if (isset($_POST)) 
    {
       // $publishinghouse_Id = addslashes($_POST['publishinghouse-id']);
        $publishinghouse_Name = addslashes($_POST['publishinghouse-name']);
        $publishinghouse_Address = addslashes($_POST['publishinghouse-address']);
        $publishinghouse_Image = imageUpload("publishinghouse-image",$connect,$berrors);

     //   if (!int_validate( $publishinghouse_Id))
        //   {
        //     $perrors .= "<br /> please enter valid ID";
        //   }
        
        
        if (checkText($publishinghouse_Name) == 0) 
        {
            $perrors .= "<br /> please enter valid Name";
        }
        // else if(!preg_match('/^[a-zA-Z\s]+$/', $publishinghouse_Name))
        // {
        //     $perrors .= '<br /> Name must be letters and spaces only';
        // }
        
        if (checkText($publishinghouse_Address) == 0) 
        {
            $perrors .= "<br /> please enter valid Address";
        }
        // else if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $publishinghouse_Address))
        // {
        //     $perrors .= '<br /> address must be letters and spaces and comma only';
        // }
        
        
        if (strlen($perrors) == 0) 
    
       {
            $sql = "insert into publishing_house (NAME,Address,Publishing_house_image) values
            ('$publishinghouse_Name','$publishinghouse_Address','$publishinghouse_Image')";
            $Insertion = mysqli_query($connect, $sql);
            if (!$Insertion) 
            {
            $perrors .= "<br /> Failed to Insert";
               
            }
            else{
                header('location:publishhouseall.php');
            }
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
    <link rel="stylesheet" href="../WebsiteHeader/2headerStyle.css">
    <link rel="stylesheet" href="../Adham/formStyle.css">
    <link rel="stylesheet" href="publish.css">
    <style>
    .navbar-dark .navbar-nav .nav-link:focus,
    .navbar-dark .navbar-nav .nav-link:hover {
        color: rgb(255 255 255);
    }
    </style>
</head>

<body>
    <!--
        error
        <?php include '/xampp/htdocs/Goodreads-master/2header.php' ?>
    -->
    <?php include '../WebsiteHeader/2header.php' ?>
    <section class="py-5 d-flex ad-black align-items-center justify-content-center">
        <div class="container w-75 text-center">
            
    </section>
    <div class="container d-flex align-items-center justify-content-center ">
        <div class=" row">
            <div class="col"><?php include 'publishinghouse.php' ?></div>
        </div>
    </div>

    <?php include '../Footer/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>