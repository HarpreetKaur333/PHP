<?php

 require_once 'db_pdo.php';
 require_once 'Common_Tool_Function.php';
$DB = new db_pdo();
$users = $DB->table('users');
$usersJson = json_encode($users, JSON_PRETTY_PRINT);
header('Content-Type: application/json');
http_response_code(200);
echo $usersJson;
// var_dump($users);
// echo 'no of users'.$users->rowCount();
echo 'no of users'.count($users);

// Array_Display($users);

// $offices = $DB->querySelect("SELECT * FROM offices where country='USA'");
//  var_dump($offices);
//  echo table_Display($offices);

//insert new country into table
//    $insert_to_country_tb = $DB->querySelect("INSERT INTO countries(code,nom) Values('IN','INDIA')");
//   var_dump($insert_to_country_tb);
// $result_del = $DB->querySelect("DELETE FROM countries WHERE CODE='IN'");
// echo 'number of deleted records: '.$result_del->rowCount();
// var_dump($insert_to_country_tb);
<<<HTML
<fom>

</form>
HTML;
