<div class="col-sm-5 col-md-4 col-lg-2 book row justify-content-center box bg-white m-3">
    <div class="front face">
        <img src="../images/<?php echo $i['bookImage'];  ?>" class="img-fluid" alt="Cinque Terre" width="200px" height="200px">
    </div>
    <div class="face back w-100 h-100">
        <div class="card w-100 h-100">
            <div class="card-body">
                <h4 class="card-title mb-3"><?php echo $i['title']; ?></h4>
                <a href="../Adham/Profiles.php?handle=<?php echo $i['BookAuthor']; ?>" style="text-decoration:none;"><h5 class="card-subtitle mb-3 text-muted"><?php
                                                            //author data
                                                            $AuthorHandle = $i['BookAuthor'];
                                                            $sql = "SELECT Fname,Minit,Lname FROM author WHERE Handle='$AuthorHandle'";
                                                            $select = mysqli_query($connect, $sql);
                                                            $author = mysqli_fetch_assoc($select);
                                                            $i['BookAuthor'] = $author['Fname'] . " " . $author['Minit'] . "." . $author['Lname'];
                                                            echo $i['BookAuthor'];
                                                            ?></h5></a>
                <p class="card-text h5 mb-3">Price &nbsp;<b><?php echo $i['price']; ?>$</b></p>
                <p class="card-text h5 mb-3 mx-auto"><?php
                                                        //rating retrival
                                                        $bookISBN = $i['ISBN'];
                                                        $sql = "SELECT sum(RatingValue)/count(RatingValue) rating FROM rate_book WHERE BookISBN='$bookISBN';";
                                                        $selectrating = mysqli_query($connect, $sql);
                                                        $bookRating = mysqli_fetch_assoc($selectrating);
                                                        $n = $bookRating['rating'];
                                                        for ($k = 0; $k < $n; $k++)
                                                            echo "<i class='fas fa-star text-warning'></i>";
                                                        $n = 5 - $n;
                                                        for ($k = 0; $k < $n; $k++)
                                                            echo "<i class='far fa-star'></i>";
                                                        ?>
                </p>
                <div class="icon-block"><a href="<?php echo "../Adham/bookPage.php?book=$bookISBN"; ?>"><i class="fas fa-book-open"></i></a>
                    <a href="<?php echo '../Adham/Profiles.php?handle=' . $AuthorHandle; ?>"> <i class="fas fa-feather-alt"></i></a>
                    <a href="<?php
                    if(isset($_SESSION['username'])){
                     echo "../Adham/buy.php?book=$bookISBN&title=".$i['title'];
                    }
                    ?>" >
                        <i class="fas fa-shopping-cart"></i></a>
                </div>

            </div>
        </div>
    </div>
</div>