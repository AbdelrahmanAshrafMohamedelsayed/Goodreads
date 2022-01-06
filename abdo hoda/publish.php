<?php 
    include '../connect.php';

// for foreign key validate [publish house] 
    $sql = "SELECT ID, NAME FROM publishing_house";
    $select = mysqli_query($connect, $sql);
    $publishHouses = mysqli_fetch_all($select, MYSQLI_ASSOC);
    // for foreign key validate 

// for foreign key validate [book store]
    $sql = "SELECT ID, NAME FROM store";
    $select = mysqli_query($connect, $sql);
    $stores = mysqli_fetch_all($select, MYSQLI_ASSOC);
    // for foreign key validate 

?>



<div class="container">
    <div class="abcontainer" id="abcontainer">

        <div class="form-abcontainer sign-in-abcontainer">
            <form action="publishbook.php" method='POST' class="abform row" enctype="multipart/form-data">
                <h1 class="headf">Publish book</h1>

                <input type="text" placeholder="Book Title" class="col" name="book-title" value="<?php
                if(isset($booktitle))
                {
                    echo $booktitle;
                }
                 ?>">
                <input type="text" placeholder="Book ISBN" class="col" name="book-isbn" value="<?php
                if(isset($bookisbn))
                {
                    echo $bookisbn;
                }
                 ?>">
                <input type="text" placeholder="Price" class="col" name="book-price" value="<?php
                if(isset($bookprice))
                {
                    echo $bookprice;
                }
                 ?>">
                <input type="text" placeholder="Number of available copies" class="col" name="book-NOAC" value="<?php
                if(isset($bookNOAC))
                {
                    echo $bookNOAC;
                }
                 ?>">
                <select name="book-ph" id="book-ph" class="selectBookPH">
                    <?php foreach ($publishHouses as $publishHouse) {?>
                    <option value=<?php echo $publishHouse['ID']?>><?php echo $publishHouse['NAME']?></option>
                    <?php } ?>
                </select>

                <select name="book-store" id="book-store" class="selectBookStore">
                    <?php foreach ($stores as $store) {?>
                    <option value=<?php echo $store['ID']?>> <?php echo $store['NAME']?></option>
                    <?php } ?>
                </select>
                <input type="text" placeholder="Number of pages" class="col" name="book-nop" value="<?php
                if(isset($booknop))
                {
                    echo $booknop;
                }
                 ?>">
                <input type="text" placeholder="Book language" class="col" name="book-language" value="<?php
                if(isset($booklanguage))
                {
                    echo $booklanguage;
                }
                 ?>">
                <div class="form-group shadow-textarea">
                    <label for="exampleFormControlTextarea6">Book description</label>
                    <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3"
                        placeholder="Write something here..."
                        name="book-description"> <?php if (isset($_POST['book-description'])) echo $_POST['book-description']; ?></textarea>
                </div>
                <div class="image-upload" class="col">
                    <p class="abd">upload image</p>
                    <label for="file-input">
                        <i class="fas fa-file-upload"></i>
                    </label>
                    <input id="file-input" type="file" name="book-image" />
                </div>
                <br>
                <?php
                if (isset($berrors) and strlen($berrors) != 0) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "there were error/s :".$berrors ?>
                </div>
                <?php }
                ?>
                <button class="ab btn-lg active">Publish</button>
            </form>
        </div>
    </div>
</div>