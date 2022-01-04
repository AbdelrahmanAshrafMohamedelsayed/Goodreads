<div class="container mb-5">
    <div class="abcontainer" id="abcontainer" style="min-height: 490px !important">

        <div class="form-abcontainer sign-in-abcontainer">
            <form action="bookstorevalidate.php" method='POST' class="abform row">
                <h1 class="headf">Book store</h1>
                <input type="text" placeholder="Store Name" class="col" name="store-name" value="<?php
                if(isset($storename))
                {
                    echo $storename;
                }
                 ?>">


                <input type="text" placeholder="Store Location" class="col" name="store-location" value="<?php
                if(isset($storelocation))
                {
                    echo $storelocation;
                }
                 ?>">
                <div class="image-upload" class="col" style="margin-bottom: -6%;">
                    <p class="abd">upload image</p>
                    <label for="file-input">
                        <i class="fas fa-file-upload"></i>
                    </label>
                    <input id="file-input" type="file" name="store-image" />
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
                <button class="ab btn-lg active">Add Store</button>
            </form>
        </div>
    </div>
</div>