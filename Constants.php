<?php

if (!isset($index_loaded)) {
    header('HTTP / 01 400 this page can not be accessed directly');
    exit('this page cannot accessed directly');
}
define('BANKNAME', 'Bank of Canada');
define('ClASSMODELNAME', 'ClassicModels');
define('AUTHOR', 'Harpreet kaur');
define('BANKLOGO', 'images/logo.png');
define('COPYRIGHT', 'Copyright Bank Of Canada <br>© 2020');
