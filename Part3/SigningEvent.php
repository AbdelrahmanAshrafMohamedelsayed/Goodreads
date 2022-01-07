<?php
$_GET['book'] = 4123;
if(isset($_GET['Part1']))
echo "hhhhhh";
$bookISBN = $_GET['book'];
session_start();
include '../connect.php';

//Retrieving Event Info
$sql = "SELECT * FROM signing_event,author_create_signing_event,book, author
where SE_ID = ID
and ISBN = bookIsbn 
and Handle = Creator;";
$select = mysqli_query($connect, $sql);
$eventData = mysqli_fetch_all($select, MYSQLI_ASSOC);

?>