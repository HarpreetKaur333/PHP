<?php

class WebPage
{
    public const DEFAULT_TITLE = 'Canada Bank';
    public const DEFAULT_DESCRIPTION = 'Number one Bank';

    public function render($pageData)
    {
        global $index_loaded;
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
        require_once 'view/nav.php'; ?>
<main>
    <section>
        <div class="w-100 p-3 h-auto d-inline-block overflow-auto">
            <?php
    if (isset($pageData['message'])) {
        echo '<div class="alert " role="alert">'.$pageData['message'].'</div>';
    } ?>
            <?php echo $pageData['content']; ?>
        </div>
    </section>
</main>
<?php
 require_once 'view/footer.php';
    }
}
