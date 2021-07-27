<?php
    // if (!isset($index_loaded)) {
    //     header('HTTP / 01 400 this page can not be accessed directly');
    //     exit('this page cannot accessed directly');
    // }
    ?>
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
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <script src="Bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Bootstrap/Jquery/jquery-3.6.0.min.js"> </script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Bootstrap/fontawesome-free-5.15.3-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="Bootstrap/fontawesome-free-5.15.3-web/css/fontawesome.css">
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
                            <input type="text" title="Search" name="esearch" id="search"
                                class="form-control search-input" value="" style="width: 140px;">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <!-- <i class="imglab">
                                <img src="images/search.png" alt="search image" class="searchkey">
                            </i> -->
                            <a class="btn-default btn" style="width: 18px;">FR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>