<?php

 require_once 'db_pdo.php';

class offices
{
    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    public function readList() //get all list of office
    {
        define('NAME', "Institut supérieur d'informatique");
        define('LOGO', 'assets/logo-header.png');
        // $DB = new db_pdo();
        // if (isset($_POST['officeCode']) and $_POST['officeCode'] != '') {
        //     //search one employee
        //     $Office_List = $DB->querySelectParam(
        //         'SELECT * FROM offices where officeCode=:officeCode',
        //     ['officeCode' => $_POST['officeCode']]);

        //     $Employes_list = $DB->querySelectParam(
        //         'SELECT * FROM employees INNER JOIN offices ON employees.officeCode = offices.officeCode where employees.officeCode=:officeCode',
        //     ['officeCode' => $_POST['officeCode']]);
        // } else {
        //     //all employee
        //     $Office_List = $DB->querySelect('SELECT * FROM offices');
        // }

        $DB = new db_pdo();
        $Office_List = $DB->table('offices');
        $PageData['content'] = "<form action='index.php?op=502' method = 'POST''>";
        $PageData['content'] .= "<input type='text' name='officeCode'>";
        $PageData['content'] .= "<input type='submit' value='search'>";
        $PageData['content'] .= '</form>';
        $PageData['content'] .= '<br><h2>Offices: </h2><br>';
        $PageData['content'] .= '<div class="col-lg-12 p-2 m-2" style="height:18.0em; overflow:auto;"><table class="table table-striped table-bordered table-hover table-responsive">';
        if (count($Office_List) === 0) {
            return 'table record is empty.';
        }
        $PageData['content'] .= '<thead class="thead-light"><th>officeCode</th><th>city</th><th>phone</th><th>addressLine1</th><th>addressLine2</th><th>state</th><th>country</th><th>postalCode</th><th>territory</th><th>Action</th></thead>';
        $PageData['content'] .= '<tbody>';
        foreach ($Office_List as $office) {
            $PageData['content'] .= '<tr>';
            $PageData['content'] .= '<td>'.$office['officeCode'].'</td>';
            $PageData['content'] .= '<td>'.$office['city'].'</td>';
            $PageData['content'] .= '<td>'.$office['phone'].'</td>';
            $PageData['content'] .= '<td>'.$office['addressLine1'].'</td>';
            $PageData['content'] .= '<td>'.$office['addressLine2'].'</td>';
            $PageData['content'] .= '<td>'.$office['state'].'</td>';
            $PageData['content'] .= '<td>'.$office['country'].'</td>';
            $PageData['content'] .= '<td>'.$office['postalCode'].'</td>';
            $PageData['content'] .= '<td>'.$office['territory'].'</td>';
            $PageData['content'] .= '<td class="col-md-1"><span>
            <a href="index.php?op=503&officeCode='.$office['officeCode'].'" class="view"><i class="fas fa-eye m-1"></i></a>
            <a href="index.php?op=504&officeCode='.$office['officeCode'].'" class="edit"><i class="fas fa-edit m-1"></i></a>
            <a href="index.php?op=505&officeCode='.$office['officeCode'].'" class="delete"><i class="fa fa-trash m-1" ></i></a>
            </span></td>';
            $PageData['content'] .= '</tr>';
        }
        $PageData['content'] .= '</tbody>';
        $PageData['content'] .= '</table></div>';
        $WebPage = new WebPage();
        $WebPage->render($PageData);
    }

    public function viewData() // view data mean see 1 office detail
    {
        define('NAME', "Institut supérieur d'informatique");
        define('LOGO', 'assets/logo-header.png');
        // $DB = new db_pdo();
        // $result_Data = $DB->querySelectParam(
        //     'SELECT * FROM offices where officeCode=:officeCode',
        // ['officeCode' => $_POST['officeCode']]);
        $DB = new db_pdo();
        $officeCode = $_GET['officeCode'];
        $office_table = $DB->querySelectParam('SELECT * FROM offices where officeCode=:officeCode',
        ['officeCode' => $_GET['officeCode']]);

        $PageData['content'] = '<div class="col-lg-12 p-2 m-2" style="height:18.0em; overflow:auto;"><table class="table table-striped table-md table-bordered table-hover table-responsive">';
        $PageData['content'] .= '<thead class="thead-light"><th>officeCode</th><th>city</th><th>phone</th><th>addressLine1</th><th>addressLine2</th><th>state</th><th>postalCode</th><th>territory</th></thead>';
        $PageData['content'] .= '<tbody>';
        foreach ($office_table as $office) {
            $PageData['content'] .= '<tr>';
            $PageData['content'] .= '<td>'.$office['officeCode'].'</td>';
            $PageData['content'] .= '<td>'.$office['city'].'</td>';
            $PageData['content'] .= '<td>'.$office['phone'].'</td>';
            $PageData['content'] .= '<td>'.$office['addressLine1'].'</td>';
            $PageData['content'] .= '<td>'.$office['addressLine2'].'</td>';
            $PageData['content'] .= '<td>'.$office['state'].'</td>';
            $PageData['content'] .= '<td>'.$office['postalCode'].'</td>';
            $PageData['content'] .= '<td>'.$office['territory'].'</td>';
            $PageData['content'] .= '</tr>';
        }
        $PageData['content'] .= '</tbody>';
        $PageData['content'] .= '</table></div>';
        $webPage = new WebPage();
        $webPage->render($PageData);

        //here 1-8 change table column name same as mysql table (same as same mysql)
    }

    public function deleteData()
    {
        // echo 'hello';
        // define('NAME', "Institut supérieur d'informatique");
        // define('LOGO', 'assets/logo-header.png');
        // $officeCode = $_GET['officeCode'];
        // $DB = new db_pdo();
        // // if (isset($_GET['officeCode']) and $_GET['officeCode'] != '') //here use Get Method to get code from url
        // //  {
        // $Delete_Table = $DB->queryParam('Delete FROM offices where officeCode=:officeCode', ['officeCode' => $_GET['officeCode']]);
        // // }
        // // $PageData['content'] = Table_Display($Delete_Table);
        // header('location:index.php?op=502');
        // // $WebPage = new WebPage();
        // // $WebPage->render($PageData);
        $DB = new db_pdo();
        $officeCode = $_GET['officeCode'];
        // var_dump($officeCode);
        if (isset($officeCode) && $officeCode != '') {
            echo 'hello';
            $deleteEmployees = $DB->queryParam('Delete FROM employees where officeCode=:officeCode',
            ['officeCode' => $officeCode]);
            $deleteOffices = $DB->queryParam('Delete FROM offices where officeCode=:officeCode',
                ['officeCode' => $officeCode]);
        }
        header('location:index.php?op=502');
    }

    // here make two function save, verify_save( like register, verify_regiter )
}
