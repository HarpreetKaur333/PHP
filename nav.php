<nav class="navbar">
    <div class="container">
        <div class="row">
            <div class="menu-icon">
                <div class="nav-menu">
                    <ul class="nav navbar-nav" style="margin: 0px;">
                        <li><a href="index.php?op=0">Home</a></li>
                        <li><a href="index.php?op=99">DownLoad</a></li>
                        <li><a href="index.php?op=10">About The Bank </a></li>
                        <?php
                             if (!isset($_SESSION['email'])) {
                                 ?>
                        <li><a href="index.php?op=1">Users Login</a> </li>
                        <?php
                             } else {
                                 ?>
                        <li><a href="index.php?op=110">Product List</a></li>
                        <li><a href="index.php?op=111">Products_Catalogue</a> </li>
                        <li><a href="index.php?op=3">Logout</a> </li>
                        Login User Email:<?php echo $_SESSION['email']; ?>

                        <?php
                             }?>
                        <li><a href=""> Visitors:<?php //Number_of_Visitior();?></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav><?php
