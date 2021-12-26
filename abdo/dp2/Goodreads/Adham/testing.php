<?php
session_start();
$arr=array(array("a"=>1,"b"=>2),array("a"=>1,"b"=>2));
foreach($arr as $i)
{
    $i['a']=4;
}
print_r ($arr);
// echo $_SESSION['handle'];
// echo $_SESSION['username'];
//  if($_SERVER['REQUEST_METHOD']=='POST')
//  {
//      echo"<img src='".$_POST['avatar']."' alt='hghsghhhhhhhh'>";
//      echo "<div>fjfhgvhj</div>";
//      if(1==1)
//      {
//          $test="okeeeey";
//      }
//      echo $test;
//  }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method='POST' >
<label for="avatar">Choose a profile picture:</label>

<input type="file"
       id="avatar" name="avatar"
       accept="image/png, image/jpeg">
       <button type="submit" name='submit'  value='sign up'>Sign Up</button>
</form>

</body>
</html> -->