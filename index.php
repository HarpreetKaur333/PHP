<?php
require_once 'Contant.php';
$title = 'Bank Of Canada';
$description = "We are Canada's central bank";
$tagline = "We are Canada's central bank. We work to preserve the value of money by keeping inflation low
and stable.";
$content = 'Governor Tiff Macklem talks about the
importance of trade and exports to Canada’s economic recovery. He also talks about steps
policy-makers and business can take to attract investment and improve
competitiveness.';

$policyCOntent = 'Eight times a year, the Bank announces its decision on the setting of its key
policy interest rate.';

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
                        <p><?php echo $tagline; ?>
                        </p>
                    </div>
                </div>
                <div class="indicators ">
                    <div class="policy-indicator">
                        <div class="indicator indicatorstopborder">
                            <div class="left">
                                <div class="label">
                                    <span>Policy Interest Rate</span>
                                </div>
                                <div class="indicator-value">
                                    <span style="color: #2196f3;">0.25%</span>
                                </div>
                                <div class="indicator-date">
                                    <span style="font-size: 14px;">Dec 9, 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="policy-indicator " style="margin-left: 15px;">
                        <div class="indicator policy-indicatortopborder">
                            <div class="left">
                                <div class="label">
                                    <span>Total CPI Inflation</span>
                                </div>
                                <div class="indicator-value">
                                    <span style="color: #2196f3;">1.0%</span>
                                </div>
                                <div class="indicator-date">
                                    <span style="font-size: 14px;">Nov 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cpi-indicators" style="margin-left:15px;">
                        <div class="indicator cpi-indicatorstopborder">
                            <div class="left">
                                <div class="labelindicatordiv">
                                    <span style="font-size: 14px; float: left;">CPI-trim</span>
                                    <span style="color: #2196f3;font-size: 14px;">1.7%</span>
                                    <span style="font-size: 14px;float: right;">Nov 2020</span>
                                </div>
                                <div class="indicator-value labelindicatordiv">
                                    <span style="font-size: 14px;float: left;">CPI-trim</span>
                                    <span style="color: #2196f3;font-size: 14px;">1.9%</span>
                                    <span style="font-size: 14px;float: right;">Nov 2020</span>
                                </div>
                                <div class="indicator-date labelindicatordiv">
                                    <span style="font-size: 14px;float: left;">CPI-trim</span>
                                    <span style="color: #2196f3; font-size: 14px;">1.5%</span>
                                    <span style="font-size: 14px;float: right;">Nov 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="img">
                    <img src="images/monetarypic.png" alt="Monetary" style="width: 98%;">
                </div>
            </div>
        </div>
    </div>
    <div class="row mainnews maincontent">
        <div class="col-sm-8">
            <div class="news-content">
                <h2><a>News</a> <span style="float: right;"><img src="images/wifiicon.jpg" alt="icon"
                            class="iconofsign"></span></h2>
                <div class="result" style="clear: both;">
                    <h3><a>Strengthening our exports</a> <span class="media-date pull-right">December 15, 2020</span>
                    </h3>
                    <div class="media-meta">
                        <span>Speech summary</span>
                        <span>Tiff Macklem</span>
                        <span>Greater Vancouver Board of Trade</span>
                        <span>Vancouver, British Columbia</span>
                        <span class="span1" style="text-decoration: none;">
                            <?php echo <<<EOD
                            {$content}
                            EOD; ?>
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
                <h2> <a class="marginleft">Exchange Rates</a></h2>
            </div>
            <div class="news-content-second">
                <div class="dollar-results">
                    <p class="dollar-results">
                        <span>1.00</span>
                        <span>Canadian dollar</span>
                    </p>
                    <p style="margin: 0 0 10.5px;">
                        <span>0.78</span>
                        <span> US dollar</span>
                    </p>
                    <div class="input-group">

                        <input class="form-control" type="text" id="inputtextbox" value="1.00">
                        <span class="input-group-add" id="textboxwithlabel">
                            <label id="textbox-text" class="hc-label">CAD</label>
                        </span>
                    </div>
                    <div class="input-group margintop">

                        <input class="form-control" type="text" id="inputtextbox" value="0.78">
                        <span class="input-group-add" id="textboxwithlabel">
                            <label id="textbox-text" class="hc-label">USD</label>
                        </span>
                    </div>
                    <div class="graph">
                        <p class="textcenter">
                            <span class="textcenter">1
                                CAD</span><span>&nbsp;=&nbsp;</span><span>0.7783</span><span>&nbsp;&nbsp;USD</span>
                        </p>
                        <p class="textcenter">
                            <span>Latest Data:<span>2020-12-21</span></span>
                        </p>
                        <div class="graphpic">
                            <img src="images/graph.png" alt="Graph" class="graphimg">
                        </div>
                    </div>
                    <div class="col-sm-12" style="width: 90%; margin-left: 40px;">
                        <h2 class="tittle">Schedule of Key <br>Interest Rate Announcements and Monetary Policy Report
                        </h2>
                        <p class="ptext"><?php echo $policyCOntent; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
require_once 'footer.php';

?>
</body>

</html>
<?php function AbpoutPage()
{
    $pageData['title'] = 'about page';
    $pageData['description'] = 'About Canada Bank';
    $pageData['count'] = <<<EOD
    <p>Page Content</p>
    EOD;
    $webPage = new WebPage();
    $webPage->render($pageData);
}
        // if (!isset($content)) {
        //     Crash(500, 'web page content is not set in web page');
        // }
