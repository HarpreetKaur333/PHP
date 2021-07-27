<?php

    // if (!isset($index_loaded)) {
    //     header('HTTP / 01 400 this page can not be accessed directly');
    //     exit('this page cannot accessed directly');
    // }
 require_once 'db_pdo.php';
 $DB = new db_pdo();
class employes
{
    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    public function List()
    {
        $DB = new db_pdo();
        if (isset($_POST['employee_id']) and $_POST['employee_id'] != '') {
            $employes = $DB->querySelectParam('SELECT * FROM employees where employeeNumber=:employee_id',
            ['employee_id' => $_POST['employee_id']]);
        // $employes = $DB->querySelect(' select * from employees where employeeNumber='.$_POST['employee_id']);
        } else {
            // $employes = $DB->table('employees');
            $employes = $DB->querySelect('SELECT * FROM employees');
        }

        // $employes = $DB->table('employees');
        // var_dump($employes);

        $PageData['content'] = "<form acton='index.php?op=300' method='POST'>";
        $PageData['content'] .= "<input type='text' name='employee_id'>";
        $PageData['content'] .= "<input type='submit' value='search'>";
        $PageData['content'] .= '</form>';
        $PageData['content'] .= Table_display($employes);
        $webPage = new WebPage();
        $webPage->render($PageData);
    }
}
