<?php
include '../connect.php';
session_start();
$ISBN=$_GET['book'];
#$sql="DELETE FROM book WHERE ISBN='$ISBN'";
$sql="CALL delbook($ISBN)";
$deletion=mysqli_query($connect,$sql);
if($deletion)
    header("Location:../Adham/books.php");

 ?>