<?php
    // if (!isset($index_loaded)) {
    //     header('HTTP / 01 400 this page can not be accessed directly');
    //     exit('this page cannot accessed directly');
    // }
    ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Number of Visitors: <?php echo visitorCount(); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?op=0">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=10">About Bank</a>
                </li>
                <?php
                    if (!isset($_SESSION['email'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=1">Login</a>
                </li>

                <?php } else {?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=110">Product List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=111">Products_Catalogue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=3">Logout</a>
                </li>
                <span class="m-3"> Login User Email:<?php echo $_SESSION['email'];
                ?>
                    <?php
                        $imgPath = $DB->querySelect("SELECT picture FROM users WHERE email='$_SESSION[email]'");
                        $imgPath = $imgPath[0]['picture'];
                        if ($imgPath == null or strlen($imgPath) == 0) {
                            $imgPath = 'users_images/default_profile_pic.png';
                        }
                        echo "<li><img src='$imgPath' height=50px width=50px></li>"; ?>
                    else{
                    <i class="fa fa-user p-2"></i>
                    }

                </span>

                <?php }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=4">User Registration Form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=300">Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=9">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=100">Product</a>
                </li>

            </ul>
            <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </div>
</nav>