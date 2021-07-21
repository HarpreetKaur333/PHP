<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php //echo $title;?>
    </title>
    <meta name="description" value="<?php// echo $description; ?>">
    </meta>
    <meta name="name" content="<?php //echo AUTHOR;?>">
    </meta>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    </meta>
    <meta name="icon" href="icon.jpg" type="images">
    </meta>
    <link rel="stylesheet" href="CSS/global.css">

    <?php ?>
</head>

<body>
    <header>
        <div class="top-bar-wrap ">
            <div class="container">
                <div class="header-logo">
                    <a href="index.php">
                        <img src="<?php echo BANKLOGO; ?>"
                            alt="Bank Logo" class="logimg">
                    </a>
                </div>
                <div class="toolbar-search pull-right">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" title="Search" name="esearch" placeholder="Search" id="search"
                                class="form-control search-input" value="" style="width: 140px;">

                            <i class="imglab">
                                <img src="images/search.png" alt="search image" class="searchkey">
                            </i>
                            <a class="btn-default btn" style="width: 18px;">FR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>