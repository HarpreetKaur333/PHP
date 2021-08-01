<?php

// if (!isset($index_loaded)) {
//     header('HTTP / 01 400 this page can not be accessed directly');
//     exit('this page cannot accessed directly');
// }
class db_pdo
{
    public const DB_USER_NAME = 'classicmodals_website';
    public const DB_USER_PW = 'abc123';
    public const DB_NAME = 'classicmodels';
    public const DB_HOST = '127.0.0.1';
    public const DB_PORT = 3306;
    private $connection;

    //automatically connect when creating a db_pdo project
    public function __construct()
    {
        $options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC];
        try {
            $this->connection = new PDO('mysql:host='.self::DB_HOST.';port='.self::DB_PORT.';dbname='.self::DB_NAME, self::DB_USER_NAME, self::DB_USER_PW, $options);
        } catch (PDOException $e) {
            http_response_code(500);
            exit('DB connection Error : '.$e->getMessage());
        }
        // echo 'conected to DB.<br>';
    }

    // for queries not returning records:Insert,Delete,Update. returns number of records affected.
    public function query($sql_str)
    {
        try {
            return $this->connection->query($sql_str);
        } catch (PDOException $e) {
            echo 'SQL Query Error: '.$e->getMessage();
        }
    }

    // for this query returns the reords, only returns records
    public function querySelect($sql_str)
    {
        try {
            return $this->connection->query($sql_str)->fetchall();
        } catch (PDOException $e) {
            echo 'SQL Query Error: '.$e->getMessage();
        }
    }

    public function queryInsert($sql_str)
    {
        try {
            return $this->connection->exec($sql_str);
            echo 'New User record created successfully.';
        } catch (PDOException $e) {
            echo 'SQL Query Error: '.$e->getMessage();
        }
    }

    // returning all records from a table
    public function table($table_name)
    {
        try {
            return $this->connection->query('select * from '.$table_name)->fetchall();
        } catch (PDOException $e) {
            echo 'SQL Query Error: '.$e->getMessage();
        }
    }

    public function concat_function()
    {
        try {
            return $this->connection->query("SELECT Concat(code,' - ', nom)
            AS CodeNom FROM provinces");
            // foreach ($provinces  as $key => $value) {
            // return $provinces;
            // var_dump($value);
            // }
        } catch (PDOException $e) {
            echo 'SQL Query Error: '.$e->getMessage();
        }
    }

    public function __destruct()
    {
    }

    public function queryParam($sql_str, $params)
    {
        try {
            $stmt = $this->connection->prepare($sql_str);
            $stmt->execute($params);
        } catch (PDOException $e) {
            Crash(500, 'Sql statement '.$e.getMessage());
        }
    }

    public function querySelectParam($sql_str, $params)
    {
        try {
            $stmt = $this->connection->prepare($sql_str);
            $stmt->execute($params);
            $records = $stmt->fetchall();
        } catch (PDOException $e) {
            Crash(500, 'Sql statement '.$e.getMessage());
        }

        return $records;
    }

    public function disconnect()
    {
        $this->connection = null;
    }
}
