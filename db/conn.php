<?php
    // Development Connection
    //$hostname = '127.0.0.1';
    //$db = 'choirmanagement_db';
    //$user = 'root';
    //$pass = '';
    //$charset = 'utf8mb4';

    // Remote Database Connection
    $hostname = 'remotemysql.com';
    $db = 'c0Q3OAm0n3';
    $user = 'c0Q3OAm0n3';
    $pass = '7Pf1rSNa3h';
    $charset = 'utf8mb4';

    //connector like jbdc and the likes

    $dsn = "mysql:hostname=$hostname; dbname=$db; charset=$charset";

    try {
        $pdo = new PDO ($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Hello Database";

    } catch (PDOException $e) {
        throw new PDOException ($e->getMessage()) ;
    }

    require_once 'crud.php';

    $crud = new crud($pdo);

?>