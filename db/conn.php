<?php
    // Development Connection
    // $hostname = '127.0.0.1';
    // $db = 'choirmanagement_db';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    // Remote Database Connection
    $hostname = 'remotemysql.com'; 
    $db = '3DRVz64Fib';
    $user = '3DRVz64Fib';
    $pass = 'Zqt4oUfcAJ';
    $charset = 'utf8mb4';

    //connector like jbdc and the likes

    $dsn="mysql:host=$hostname;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Hello Database";

    } catch (PDOException $e) {
        throw new PDOException ($e->getMessage()) ;
    }

    require_once 'crud.php';
    require_once 'user.php';

    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin","password");

?>