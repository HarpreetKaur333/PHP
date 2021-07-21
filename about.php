<?php

class AboutPage
{
    public function AboutPage()
    {
        $pageData['title'] = 'About Page';
        $pageData['description'] = 'About Canada Bank';
        $pageData['content'] = <<<EOD
        <p>Governor Tiff Macklem talks about the
        importance of trade and exports to Canada’s economic recovery. He also talks about steps
        policy-makers and business can take to attract investment and improve
        competitiveness.</p>
        EOD;
        $webPage = new WebPage();
        $webPage->render($pageData);
    }
}
