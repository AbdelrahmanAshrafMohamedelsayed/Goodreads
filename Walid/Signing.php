<?php

//session_start();
include '../connect.php';
$authorHandle = $_SESSION['handle'];

$sql = "SELECT ISBN, title FROM book WHERE BookAuthor = '$authorHandle'";
$select = mysqli_query($connect, $sql);
$books = mysqli_fetch_all($select, MYSQLI_ASSOC);
?>

<!DOCTYPE html>

<div class="container">
    <div class="abcontainer" id="abcontainer">

        <div class="form-abcontainer sign-in-abcontainer">
            <form action="SigningEventForm.php" method='POST' class="abform row">
                <h2 class="headf">Create a Signing Event</h2>
                
                <input type="text" placeholder="Event Title" class="col" name="event-title" value="<?php
                if(isset($eventTitle))
                {
                    echo $eventTitle;
                }
                 ?>">
                 <input type="text" placeholder="Event Location" class="col" name="event-location" value="<?php
                if(isset($eventLocation))
                {
                    echo $eventLocation;
                }
                 ?>">

                <select name="books" id="books">
                    <?php foreach ($books as $book) {?>
                    <option value= "<?php echo $book['ISBN']?>"><?php echo $book['title']?></option>
                    <?php } ?>
                </select>

                <div class="image-upload" class="col">
                    <p class="abd">Upload an Image</p>
                    <label for="file-input">
                        <i class="fas fa-file-upload"></i>
                    </label>
                    <input id="file-input" type="file" name="event-image" />
                </div>
                <!-- <input type="file" id="myFile" name="filename"> -->
                <br>
                <?php
                if (isset($aerrors) and strlen($aerrors) != 0) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "there were error/s :".$aerrors ?>
                </div>
                <?php }
                ?>
                <button class="ab btn-lg active">Create</button>

                
            </form>
        </div>
    </div>
</div>