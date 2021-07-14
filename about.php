<?php
require_once 'Contant.php';
$title = 'Bank Of Canada';
$description = 'About the Bank';
?>
<!DOCTYPE html>
<html lang="en-CA">

<head>
    <title><?php echo $title; ?>
    </title>
    <meta name="description" value="<?php echo $description; ?>">
    </meta>
    <meta name="name" content="<?php echo AUTHOR; ?>">
    </meta>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    </meta>
    <meta name="icon" href="icon.jpg" type="images">
    </meta>
    <link rel="stylesheet" href="CSS/global.css">
    <?php ?>
</head>

<body>
    <?php
require_once 'header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="tag">
                    <div class="main-quote">
                        <p>
                        </p>
                    </div>
                </div>

                <div class="img">
                    <img src="images/about.png" alt="Monetary" style="width: 98%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row mainnews maincontent">
        <div class="col-sm-8">
            <div class="news-content">
                <h2><a>ABOUT</a> <span style="float: right;"><img src="images/wifiicon.jpg" alt="icon"
                            class="iconofsign"></span></h2>
                <div class="result" style="clear: both;">
                    <h3>The Bank of Canada is the nation's central bank. Its principal role is "to promote the economic
                        and financial welfare of Canada," as defined in the Bank of Canada Act. The Bank’s four main
                        areas of responsibility are:</h3>
                    <div class="media-meta">
                        <span>Speech summary</span>
                        <span>Tiff Macklem</span>
                        <span>Greater Vancouver Board of Trade</span>
                        <span>Vancouver, British Columbia</span>
                        <span class="span1" style="text-decoration: none;">
                            Monetary policy: The Bank influences the supply of money circulating in the economy, using
                            its monetary policy framework to keep inflation low and stable.
                        </span>
                        <span class="tax-name ">Content Type(s)</span>
                        <span><a>Press</a></span>
                        <span><a>Speeches and appearances</a></span>
                        <span><a>Speech summaries</a></span>
                        <span class="hrline">Topic(s)</span>
                        <span>Coronavirus disease (COVID-19)</span>
                        <span>Monetary policy</span>
                        <span>Productivity</span>
                        <span>Service sector</span>
                        <span>Trade integration</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="news-content-second">
                <h2> <a class="marginleft">Find out how you can join our team, and get the facts on our university
                        recruitment campaign</a></h2>
            </div>

        </div>
    </div>
    <?php
require_once 'footer.php';
?>
</body>

</html>