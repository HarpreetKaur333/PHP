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
                Login User Email:<?php echo $_SESSION['email'];
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=4">User Registration Form</a>
                </li>

            </ul>
            <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </div>
</nav>
<!-- <nav class="navbar">
    <div class="container">
        <div class="row">
            <div class="menu-icon">
                <div class="nav-menu">
                    <ul class="nav navbar-nav" style="margin: 0px;">
                        <li><a href="index.php?op=0">Home</a></li>
                        <li><a href="index.php?op=99">DownLoad</a></li>
                        <li><a href="index.php?op=10">About The Bank </a></li>
                        <?php
                            // if (!isset($_SESSION['email'])) {
                                 ?>
<li><a href="index.php?op=1">Users Login</a> </li>
<?php
                            //  } else {
                                 ?>
<li><a href="index.php?op=110">Product List</a></li>
<li><a href="index.php?op=111">Products_Catalogue</a> </li>
<li><a href="index.php?op=3">Logout</a> </li>
<!-- Login User Email:<?php //echo $_SESSION['email'];?>
-->

<?php
                            // }?>
<!-- <li><a href=""> Visitors:<?php //Number_of_Visitior();?></a> -->
</li>

<!-- </ul>
</div>
</div>
</div>
</div>
</nav> -->