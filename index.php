<?php
// phpinfo();
// exit();
session_start();
require_once 'Contant.php';
require_once 'Common_Tool_Function.php';
require_once 'view/WebPage.php';
require_once 'HomePage.php';
require_once 'CoreFunctionofBank.php';
require_once 'about.php';
require_once 'Users.php';
require_once 'product_table.php';
?>

<?php
if (isset($_GET['op'])) {
    $op = $_GET['op'];

    switch ($op) {
        case 0:
            $home_Page_obj = new HomePage();
            $home_Page_obj->HomePage();
            break;
        case 1:
            $users = new Users();
            $users->Login(); //display login page
            break;
        case 2:
            $users = new Users();
            $users->Login_Verify(); //verify the login details
            break;
        case 3:
                $users = new Users();
                $users->Logout(); //verify the login details
                break;
        case 10:
            $about_page_obj = new AboutPage();
            $about_page_obj->AboutPage();
            break;
        case 110:
            if (!isset($_SESSION['email'])) {
                Crash(401, 'Must be Logged in to acces the Page');
            } else {
                $product_Obj = new Product();
                $product_Obj->Products_List();
                break;
            }
            // no break
        case 111:
                $product_Obj = new Product();
                $product_Obj->Products_Catalogue();
                break;
        case 99:
            header('Content-type: application/pdf');
            header('Content-Dispostion:attachment;filename=some_file.pdf');
            readfile('HarpreetKaur_CV.pdf');
            exit();
            break;
        default:
            header('HTTP/1.0  400 Operation not supported- bad Op code-file index not found..!!');
            exit();
}
}
