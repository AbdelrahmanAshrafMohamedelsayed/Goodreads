<?php
include '../connect.php';
session_start();
$ISBN=$_GET['book'];
$ID=$_GET['id'];
$sql="DELETE FROM review WHERE ID=$ID";
$deletion=mysqli_query($connect,$sql);
if($deletion)
    header("Location:../Part1/bookPage.php?book=$ISBN");
 ?>