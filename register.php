<?php

 require_once 'db_pdo.php';
class register
{
    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    public function register($msg = '')
    {
        $pageData['title'] = 'Register As New User';
        $pageData['description'] = 'Register As New User';

        $pageData['content'] .= <<<HTML
HTML;
        $webPage = new WebPage();
        $webPage->render($pageData);
    }

    public function register_verify()
    {
    }
}
