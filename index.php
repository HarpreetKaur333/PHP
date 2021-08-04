<?php
// phpinfo();
// exit();
session_start();
$index_loaded = true; // the user entered here frist
require_once 'Constants.php';
require_once 'Common_Tool_Function.php';
require_once 'view/WebPage.php';
require_once 'HomePage.php';
require_once 'about.php';
require_once 'Users.php';
require_once 'employes.php';
require_once 'Product.php';
?>

<?php
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = 0;
}
    switch ($op) {
        //here do user Code (Final Practical Exam)
        case 9:
            $users = new Users();
            $users->List(); //display List Of User
            break;

        case 8:
            $users = new Users();
            $users->Delete(); //Delete User
            break;

        case 6:
            $users = new Users();
            $users->Edit(); //edit User
            break;

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

        case 4:
                $users = new Users();
                $users->register(); //display register page
                break;

        case 5:
                $register = new Users();
                $register->register_verify(); //verify the register details
                break;

        case 10:
            $about_page_obj = new AboutPage();
            $about_page_obj->AboutPage();
            break;
        case 110:
            // if (!isset($_SESSION['email'])) {
                Crash(401, 'Must be Logged in to acces the Page');
            // } else {
                $product_Obj = new Product();
                $product_Obj->Products_List();
                break;
            // }
        case 111:
                $product_Obj = new Product();
                $product_Obj->Products_Catalogue();
                break;
        case 190: //products web service-returns list of products json
            $product_Obj = new Product();
            $product_Obj->ListJSON();
            break;
        case 100: //show the list of all products
            $product_Obj = new Product();
            $product_Obj->List();
            break;
        case 102: //display seach record
                $product_Obj = new Product();
                $product_Obj->Display();
                break;
        case 103: //display seach record
            $product_Obj = new Product();
            $product_Obj->AddorEdit();
            break;
        case 104: //delete product
                $product_Obj = new Product();
                $product_Obj->Delete();
                break;
        case 105: //Save product
                $product_Obj = new Product();
                $product_Obj->Save();
                break;
        case 111: //Save product
                    $product_Obj = new Product();
                    $product_Obj->Verify_AddEdit();
                    break;
        case 300:
            $employes = new employes();
            $employes->List();
            break;
        case 99:
            header('Content-type: application/pdf');
            header('Content-Dispostion:attachment;filename=some_file.pdf');
            readfile('HarpreetKaur_CV.pdf');
            exit();
            break;
        default:
            Crash(400, 'Operation not supported- bad Op code-file index not found..!!');
}
