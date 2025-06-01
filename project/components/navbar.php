<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Imran Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == "index.php" ? "active":null ?>" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == "shop.php" ? "active":null ?>" href="./shop.php">Shop</a>
                </li>
                <?php if(!isset($_SESSION['iUserInfo'])){ ?>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == "sign-in.php" ? "active":null ?>" href="./sign-in.php">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == "sign-up.php" ? "active":null ?>" href="./sign-up.php">Sign Up</a>
                </li>
                <?php }else{ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php 
                            $fullNameArr = explode(" ", $_SESSION['iUserInfo']->name); 
                            echo $fullNameArr[0];
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./my-profile.php">My Profile</a></li>
                        <li><a class="dropdown-item" href="./change-password.php">Change Password</a></li>
                        <li><a class="dropdown-item" href="./change-profile-picture.php">Change Profile Picture</a></li>
                        <li><a class="dropdown-item" href="./my-orders.php">My Orders</a></li>
                        <?php if($_SESSION['iUserInfo']->role == "admin"){ ?>
                        <li><a class="dropdown-item" href="./admin">Admin Panel</a></li>
                        <?php } ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./logout.php">Log out</a></li>
                    </ul>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <!-- cart -->
                <li class="nav-item me-3">
                    <a class="nav-link position-relative" href="./cart.php">
                        <!-- fontawesome 6 cart icon -->
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle-x rounded-circle">
                            <?php 
                                if(isset($_SESSION['cart'])){
                                    $total = 0;
                                    foreach($_SESSION['cart'] as $key => $value){
                                        $total += $value;
                                    }
                                    echo $total;
                                }else{
                                    echo 0;
                                }
                            ?>
                        </span>
                    </a>
                </li>
            </ul>
            <form class="" method="get" action="./search.php">
                <div class="input-group">
                    <input type="text" class="form-control rounded-end-0" placeholder="Search..." name="query">
                    <button class="input-group-text rounded-start-0 btn btn-primary" id="basic-addon1">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>