<?php

class WebPage
{
    public const DEFAULT_TITLE = 'Canada Bank';
    public const DEFAULT_DESCRIPTION = 'Number one Bank';

    public function render($pageData)
    {
        if (!isset($pageData['title'])) {
            $pageData['title'] = self::DEFAULT_TITLE;
        }
        if (!isset($pageData['description'])) {
            $pageData['description'] = self::DEFAULT_DESCRIPTION;
        }
        if (!isset($pageData['content'])) {
            Crash(500, 'Web Page Content not load');
        }
        require_once 'view/header.php';
        require_once 'nav.php'; ?>
<main>
    <?php echo $pageData['content']; ?>
</main>
<?php
 require_once 'view/footer.php';
    }
}