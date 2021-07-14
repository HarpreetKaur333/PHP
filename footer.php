<?php
require_once 'Contant.php';
const CONTACTNO = 15148422426;
const HEADOFFICE = '234 Wellington Street
Ottawa, ON, K1A 0G9';
const TIME = 'Monday to Friday 9:00 to 17:00 (ET)';

const DETAILHEADOFFICE = 'Our head office in Ottawa and regional offices serve as contact points for Canadians requiring assistance to access services offered by the Bank.';
?>
<!DOCTYPE html>
<html lang="en">

<footer>
    <footer>
        <div class="isi-footer-top-holder">
            <div class="isi-footer-top-inner ">
                <div class="isi-footer-row">

                    <div class="isi-footer-md-col-4 footergrid">
                        <div class="footer-title-holder">
                            <h4 class="footertitle">About</h4>
                            <p class="footerp intro"><?php echo DETAILHEADOFFICE; ?>
                            </p>
                            <p class="footerp intro"><i style="margin-right: 10px;"><img src="images/locationicon.jpg"
                                        alt="location" class="infoaboutclg" style="width: 14px;"></i><?php echo HEADOFFICE; ?>
                            </p>
                            <p class="footerp intro"><i style="margin-right: 10px;"><img src="images/phoneicon.png"
                                        alt="location" class="infoaboutclg" style="width: 14px;"></i>+1 514 842 2426</p>
                            <p class="footerp intro"><i style="margin-right: 10px;"><img src="images/timeicon.png"
                                        alt="location" class="infoaboutclg" style="width: 14px;"></i><?php echo TIME; ?>
                            </p>
                        </div>
                    </div>

                    <div class="isi-footer-md-col-4 footergrid">
                        <div class="footer-title-holder">
                            <h4 class="footertitle">Affiliate Sites</h4>
                            <p class="footerp intro">Bank of Canada Museum</p>
                            <p class="footerp intro">Canada Savings Bonds</p>
                            <p class="footerp intro">Unclaimed Balances </p>
                        </div>
                    </div>
                    <div class="isi-footer-md-col-4 footergrid">
                        <div class="footer-title-holder">
                            <h4 class="footertitle">Instagram</h4>
                            <img src="images/instpic.png" alt="Instagram" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</footer>

<body>

</body>

</html>