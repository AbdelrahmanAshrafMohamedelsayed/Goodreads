<div class="container">
    <div class="abcontainer" id="abcontainer">

        <div class="form-abcontainer sign-in-abcontainer">
            <form action="validate_publishinghouse.php" method='POST' class="abform row">
                <h1 class="headf">Adding New Publishing House</h1>

                <input type="text" placeholder=" Id" class="col" name="publishinghouse-id" value="<?php
                if(isset($publishinghouse_Id))
                {
                    echo $publishinghouse_Id;
                }
                 ?>">
                <input type="text" placeholder=" Name" class="col" name="publishinghouse-name" value="<?php
                if(isset($publishinghouse_Name))
                {
                    echo $publishinghouse_Name;
                }
                 ?>">
                <input type="text" placeholder=" Address" class="col" name="publishinghouse-address" value="<?php
                if(isset($publishinghouse_Address))
                {
                    echo $publishinghouse_Address;
                }
                 ?>">
               
                
                <div class="image-upload" class="col">
                    <p class="abd">upload image</p>
                    <label for="file-input">
                        <i class="fas fa-file-upload"></i>
                    </label>
                    <input id="file-input" type="file" name="publishinghouse-image" />
                </div>
                <!-- <input type="file" id="myFile" name="filename"> -->
                <br>
                <?php
                if (isset($perrors) and strlen($perrors) != 0) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "there were error/s :".$perrors ?>
                </div>
                <?php }
                ?>
                <button class="ab btn-lg active">Create</button>
            </form>
        </div>
    </div>
</div>