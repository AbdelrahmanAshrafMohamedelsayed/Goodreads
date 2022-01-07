<?php include '../connect.php';
session_start();

if(isset($_POST['demo']))
{
    $val=$_POST['demo'];
    $myauthor=$_GET['handle'];
    $rater=$_SESSION['username'];
    $sql="INSERT INTO rate_author(RatingValue, rated, rater) VALUES ('$val','$myauthor','$rater');";
    $Rateinsertion=mysqli_query($connect,$sql);
    if(!$Rateinsertion)
    {
        $sql="UPDATE rate_author SET RatingValue='$val'WHERE  rated='$myauthor' AND rater='$rater';";
        $updaterate=mysqli_query($connect,$sql);
    }
}



if(isset($_GET['username']))
{
    $username=$_GET['username'];
    $sql="SELECT * FROM USERS WHERE username='$username'";
    $selectQuery=mysqli_query($connect,$sql);
    $data=mysqli_fetch_assoc($selectQuery);
    $facebook=$data['facebookacc'];
    $twitter=$data['twitteracc'];
    $linkedin=$data['linkedinacc'];
    $image=$data['Image'];
    $sql="SELECT ISBN,price,BookAuthor,bookImage,title FROM buy,book WHERE buyer='$username' AND BookISBN=ISBN";
    $select=mysqli_query($connect,$sql);
    $books=mysqli_fetch_all($select, MYSQLI_ASSOC);
}
elseif(isset($_GET['handle']))
{
    $handle=$_GET['handle'];
    $sql="SELECT * FROM author WHERE handle='$handle'";
    $selectQuery=mysqli_query($connect,$sql);
    $data=mysqli_fetch_assoc($selectQuery);
    $facebook=$data['facebook'];
    $twitter=$data['twitter'];
    $linkedin=$data['linkedin'];
    $image=$data['ProfileImage'];
    $bio=$data['Bio'];
    $sql="SELECT ISBN,price,BookAuthor,bookImage,title FROM book WHERE BookAuthor='$handle'";
    $select=mysqli_query($connect,$sql);
    $books=mysqli_fetch_all($select, MYSQLI_ASSOC);
    //rating retrival
    $sql="SELECT sum(RatingValue)/count(RatingValue) rating FROM rate_author WHERE rated='$handle';";
    $selectrating=mysqli_query($connect,$sql);
    $AuthorRating=mysqli_fetch_assoc($selectrating);
    $AuthorRating=$AuthorRating['rating'];
}
if(!$data['Nationality'])
{
    $data['Nationality']="Unknown";
}
?>