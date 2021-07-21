<?php

 require_once 'db_pdo.php';
 require_once 'Common_Tool_Function.php';
$DB = new db_pdo();
$users = $DB->table('orderdetails');
var_dump($users);
// Array_Display($users);
