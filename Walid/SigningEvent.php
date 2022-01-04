<?php
$_GET['book'] = 4123;
if(isset($_GET['adham']))
echo "hhhhhh";
$bookISBN = $_GET['book'];
session_start();
include '../connect.php';

//book retrieval
$sql = "SELECT * FROM signing_event,author_create_signing_event,book, author
where SE_ID = ID
and ISBN = bookIsbn 
and Handle = Creator;";
$select = mysqli_query($connect, $sql);
$eventData = mysqli_fetch_all($select, MYSQLI_ASSOC);

// $sql = "SELECT Fname, Minit, Lname, book.title FROM signing_event,author_create_signing_event,book, author
// where SE_ID = '$id'
// and ISBN = bookIsbn 
// and Handle = Creator;";
// $select = mysqli_query($connect, $sql);
// $auhor_book_Data = mysqli_fetch_assoc($select);
// ?>