<?php
session_start();
include '../connect.php';
if(isset($_POST['demo']))
{
    $val=$_POST['demo'];
    $mybook=$_GET['book'];
    $rater=$_SESSION['username'];
    $sql="INSERT INTO rate_book(RatingValue, BookISBN, rater) VALUES ('$val','$mybook','$rater');";
    $Rateinsertion=mysqli_query($connect,$sql);
    if(!$Rateinsertion)
    {
        $sql="UPDATE rate_book SET RatingValue='$val' WHERE  BookISBN='$mybook' AND rater='$rater';";
        $updaterate=mysqli_query($connect,$sql);
    }
}
$bookISBN = $_GET['book'];

//rating retrival
$sql="SELECT sum(RatingValue)/count(RatingValue) rating FROM rate_book WHERE BookISBN='$bookISBN';";
$selectrating=mysqli_query($connect,$sql);
$bookRating=mysqli_fetch_assoc($selectrating);
$bookRating=$bookRating['rating'];

//book retrival
$sql = "SELECT * FROM book WHERE ISBN=$bookISBN";
$select = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($select);

//author data
$AuthorHandle = $data['BookAuthor'];
$sql = "SELECT Fname,Minit,Lname FROM author WHERE Handle='$AuthorHandle'";
$select = mysqli_query($connect, $sql);
$author = mysqli_fetch_assoc($select);
$data['BookAuthor'] = $author['Fname'] . " " . $author['Minit'] . "." . $author['Lname'];

//publishHouse data
$publishHouse=$data['BookPH'];
$sql="SELECT NAME FROM publishing_house WHERE ID=$publishHouse";
$select = mysqli_query($connect, $sql);
$publishHouse=mysqli_fetch_assoc($select);
$data['PHID']=$data['BookPH'];
$data['BookPH']=$publishHouse['NAME'];

//Store data
$store=$data['BookStore'];
$sql="SELECT NAME FROM store WHERE ID=$store";
$select = mysqli_query($connect, $sql);
$store=mysqli_fetch_assoc($select);
$data['StoreID']=$data['BookStore'];
$data['BookStore']=$store['NAME'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['review'])) {
    $username = $_SESSION['username'];
    //review insertion
    $review = addslashes($_POST['review']);
    $currDate=date("Y-m-d");
    $sql = "INSERT INTO review (BOOKISBN,URName,ReviewText,DateOfReview)
    VALUES ($bookISBN,'$username','$review','$currDate')";
    $Insertion = mysqli_query($connect, $sql);
}
//reviews retrival
$sql = "SELECT * FROM review WHERE BOOKISBN='$bookISBN' ORDER BY DateOfReview";
$select = mysqli_query($connect, $sql);
$reviews = mysqli_fetch_all($select, MYSQLI_ASSOC);
//insert likes and dislikes
function SelectAction($username,$reviewer,$BISBN,$RID,$connect,$op)
{
    $SelLikeQuery="SELECT * FROM ".$op."like_reaction WHERE  Reactor='$username' AND Reviewer='$reviewer' AND bookIsbn='$BISBN' AND ReviewID= $RID";
    return mysqli_fetch_assoc(mysqli_query($connect,$SelLikeQuery));
}
function DeleteAction($username,$reviewer,$BISBN,$RID,$connect,$op)
{
    $DeleteLikeQuery="DELETE FROM ".$op."like_reaction WHERE  Reactor='$username' AND Reviewer='$reviewer' AND bookIsbn='$BISBN' AND ReviewID= $RID";
    mysqli_query($connect,$DeleteLikeQuery);
}
if(isset($_GET['like']))
{
    $username = $_SESSION['username'];
    $index=$_GET['num'];
    $reviewer =$reviews[$index]['URName'];
    $RID=$reviews[$index]['ID'];
    $BISBN=$reviews[$index]['BOOKISBN'];
    if($_GET['like']==1)
    {
        DeleteAction($username,$reviewer,$BISBN,$RID,$connect,'dis');
        $LikeQuery="INSERT INTO like_reaction (Reactor, Reviewer, bookIsbn, ReviewID) VALUES ('$username','$reviewer','$BISBN',$RID) ";
        $InsertionLike=mysqli_query($connect,$LikeQuery);
    }
    else if($_GET['like']==0)
    {
        DeleteAction($username,$reviewer,$BISBN,$RID,$connect,"");
    }
    unset($_GET['like']);
}
if(isset($_GET['dislike']))
{
    $username = $_SESSION['username'];
    $index=$_GET['num'];
    $reviewer =$reviews[$index]['URName'];
    $RID=$reviews[$index]['ID'];
    $BISBN=$reviews[$index]['BOOKISBN'];
    if($_GET['dislike']==1)
    {
        DeleteAction($username,$reviewer,$BISBN,$RID,$connect,"");
        $disLikeQuery="INSERT INTO dislike_reaction (Reactor, Reviewer, bookIsbn, ReviewID) VALUES ('$username','$reviewer','$BISBN',$RID) ";
        $InsertiondisLike=mysqli_query($connect,$disLikeQuery);
    }
    else if($_GET['dislike']==0)
    {
        DeleteAction($username,$reviewer,$BISBN,$RID,$connect,'dis');
    }
    unset($_GET['dislike']);
}
if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    foreach($reviews as &$it)
    {
        $reviewer=$it['URName'];
        $revID=$it['ID'];
        $sql = "SELECT count(*) likes FROM like_reaction WHERE bookIsbn='$bookISBN' AND reviewer='$reviewer' AND ReviewID='$revID'";
        $select = mysqli_query($connect, $sql);
        if($select)
        {
            $likes=mysqli_fetch_assoc($select);
            $it['likes']=$likes['likes'];
        }
        else
        {
            $it['likes']=0;
        }
        $sql = "SELECT count(*) dislikes FROM dislike_reaction WHERE bookIsbn='$bookISBN' AND reviewer='$reviewer' AND ReviewID='$revID'";
        $select = mysqli_query($connect, $sql);
        if($select)
        {
            $dislikes=mysqli_fetch_assoc($select);
            $it['dislikes']=$dislikes['dislikes'];
        }
        else
        {
            $it['dislikes']=0;
        }
    }  
}

?>