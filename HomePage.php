<?php

 class HomePage
 {
     public function HomePage()
     {
         $pageData['title'] = 'Home Page About Bank'.BANKNAME;
         $pageData['description'] = "We are Canada's central bank. We work to preserve the value of money by keeping inflation low and stable.";
         $pageData['content'] = <<<EOD
         <div class="tag">
         <div class="main-quote">
             <p>We are Canada's central bank. We work to preserve the value of money by keeping inflation low and stable.</p>
         </div>
    </div>

EOD;
         $webPage = new WebPage();
         $webPage->render($pageData);
     }
 }
