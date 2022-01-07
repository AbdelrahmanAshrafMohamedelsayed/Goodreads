<div class="container">
    <div class="abcontainer" id="abcontainer">

        <div class="form-abcontainer sign-in-abcontainer">
            <form action="../Part1/AddAuthor.php" method='POST' class="abform row">
                <h1 class="headf">Author</h1>

                <input type="text" placeholder="Handle" class="col" name='handle' 
                value=
                "<?php
                if(isset($handle))
                {
                    echo $handle;
                }
                 ?>">
                <input type="password" placeholder="password" class="col" name='apass'value=
                "<?php
                if(isset($password)&&isset($handle))
                {
                    echo $password;
                }
                 ?>">
                <input type="text" placeholder="First Name" class="col" name='afname'value=
                "<?php
                if(isset($fname) and isset($handle))
                {
                    echo $fname;
                }
                 ?>">
                <input type="text" placeholder="Minit" class="col" name='aminit' value=
                "<?php
                if(isset($minit) AND isset($handle))
                {
                    echo $minit;
                }
                 ?>">
                <input type="text" placeholder="Last Name" class="col" name='alast'value=
                "<?php
                if(isset($lname) AND isset($handle))
                {
                    echo $lname;
                }
                 ?>">
                <br>
                <?php
                if (isset($aerrors) and strlen($aerrors) != 0) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo "there were error/s :".$aerrors ?>
                    </div>
                <?php }
                ?>
                <button class="ab btn-lg active">Add Author</button>
            </form>
        </div>
    </div>
</div>