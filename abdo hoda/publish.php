<div class="container">
    <div class="abcontainer" id="abcontainer">

        <div class="form-abcontainer sign-in-abcontainer">
            <form action="publishbook.php" method='POST' class="abform row">
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
                <input type="text" placeholder="Book store" class="col" name="book-store" value="<?php
                if(isset($bookstore))
                {
                    echo $bookstore;
                }
                 ?>">

                <input type="text" placeholder="Book publish house" class="col" name="book-ph" value="<?php
                if(isset($bookph))
                {
                    echo $bookph;
                }
                 ?>">
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
                        placeholder="Write something here..." name="book-description"
                        <?php if (isset($_POST['book-description'])) echo $_POST['book-description']; ?>> </textarea>
                </div>
                <div class="image-upload" class="col">
                    <p class="abd">upload image</p>
                    <label for="file-input">
                        <i class="fas fa-file-upload"></i>
                    </label>
                    <input id="file-input" type="file" name="book-image" />
                </div>
                <!-- <input type="file" id="myFile" name="filename"> -->
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