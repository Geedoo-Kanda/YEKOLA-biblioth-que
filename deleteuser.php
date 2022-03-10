<?php 
 session_start();

$id = $_GET['id'];

    $host ='localhost';
    $username = 'root';
    $password = '';
    $database = 'yekola';

    try {
        $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
        $req = $DB->query("DELETE FROM users WHERE id='$id'");
        header('Location: users.php?delete=ok');

    } catch (PDOException $e) {
        $erro_message = $e->getMessage;
        echo($erro_message);
        exit(); 
    }

