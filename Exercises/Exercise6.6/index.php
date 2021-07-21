<!DOCTYPE html>
<html>
<?php
const DEFAULT_TITLE = 'Exercises';
const DEFAULT_CONTENT = 'Exercises_6.6';
$title = 'Exercise 6.6';
$content = 'Exercise 6.6';

require_once 'Tool.php';
?>

<head>
    <title><?php Display_Msg($title); ?>
    </title>
</head>

<body>

    <?php
    require_once 'product.php';
    //require_once 'Products_Catalogue_table.php';

 if (isset($_GET['op'])) {
     $op = $_GET['op'];

     switch ($op) {
        case 110:
            $product_Obj = new Product();
            $product_Obj->Products_List();
            break;
        case 111:
            $product_Obj = new Product();
            $product_Obj->Products_Catalogue();
            break;
        case 10:
            $product_Obj->Products_About();
                break;
        // case 99:
        //     header('Content-type: application/pdf');
        //     header('Content-Dispostion:attachment;filename=some_file.pdf');
        //     readfile('HarpreetKaur_CV.pdf');
        //     exit();
        //     break;
        default:
            header('HTTP/1.0  400 Operation not supported- bad Op code-file index not found..!!');
            exit();
    }
 }

require_once 'header.php';

require_once 'footer.php';

?>
</body>

</html>