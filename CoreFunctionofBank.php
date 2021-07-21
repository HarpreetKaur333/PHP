<?php

class CoreFunctionOfBank
{
    public function CoreFunctionOfBank()
    {
        $pageData['title'] = 'Core Functions'.BANKNAME;
        $pageData['description'] = "As the nation's central bank, the Bank of Canada has four main areas of responsibility";
        $pageData['count'] = <<<EOD
        <p>Page Content</p>
        EOD;
        $webPage = new WebPage();
        $webPage->render($pageData);
    }
}
