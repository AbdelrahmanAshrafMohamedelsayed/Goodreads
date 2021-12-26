<div class="container">
    <div class="abcontainer" id="abcontainer">

        <div class="form-abcontainer sign-in-abcontainer">
            <form action="loginPage.php" method='POST' class="abform row">
                <h1 class="headf">Reader</h1>

                <input type="text" placeholder="Username" name="username" class="col"value=
                "<?php
                if(isset($username))
                {
                    echo $username;
                }
                 ?>">
                <input type="password" placeholder="password" class="col" name='upass'value=
                "<?php
                if(isset($username) AND isset($password))
                {
                    echo $password;
                }
                 ?>">
                <input type="text" placeholder="First Name" name="ufname" class="col"value=
                "<?php
                if(isset($username) AND isset($fname))
                {
                    echo $fname;
                }
                 ?>">
                <input type="text" placeholder="Minit" name="uminit" class="col"value=
                "<?php
                if(isset($username) AND isset($minit))
                {
                    echo $minit;
                }
                 ?>">
                <input type="text" placeholder="Last Name" class="col" name='ulname'value=
                "<?php
                if(isset($username) AND isset($lname))
                {
                    echo $lname;
                }
                 ?>">
                <br>
                <?php
                if (isset($uerrors) and strlen($uerrors) != 0) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo "there were error/s :".$uerrors ?>
                    </div>
                <?php }
                ?>

                <button class="ab btn-lg active">Sign Up</button>
            </form>
        </div>
    </div>
</div>