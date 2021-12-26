<?php
 ?>
<div class="fluid">
    <nav class="navbar navbar-expand-sm navbar-dark bg-main">
        <div class="container">
            <a href="" class="navbar-brand me-5 fs-3"><i class="fal fa-book  me-1"></i> GOODREADS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-md-flex justify-content-end" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="../Adham/Profiles.php?<?php 
                    if(isset($_SESSION['username'] ))
                    echo "username=".$_SESSION['username'] ;
                    else if(isset($_SESSION['handle'] ))
                    echo "handle=".$_SESSION['handle'] ;
                    ?>" class="nav-link"><i class="fas fa-user-circle fs-3"></i></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-plus-circle fs-3"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Book</a></li>
                            <li><a class="dropdown-item" href="#">Store</a></li>
                            <li><a class="dropdown-item" href="#">Publishing House</a></li>
                            <li><a class="dropdown-item" href="#">Signing Event</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="../Adham/loginPage.php?logout=1" class="nav-link"><i class="fas fa-sign-out-alt fs-3"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="fluid">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ad-last-ul mx-auto">
                    <li class="nav-item px-3"><a href="" class="nav-link">Books</a></li>
                    <li class="nav-item px-3 "><a href="" class="nav-link">Authors</a></li>
                    <li class="nav-item px-3"><a href="" class="nav-link">Stores</a></li>
                    <li class="nav-item px-3"><a href="" class="nav-link">Publishing Houses</a></li>
                    <li class="nav-item px-3"><a href="" class="nav-link">Signing Events</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>