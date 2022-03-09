<?php 
        session_start();
    $categorie = $_POST['categorie'];
    $id = $_POST['id'];

    $host ='localhost';
    $username = 'root';
    $password = '';
    $database = 'yekola';

    try {
        $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
        
        $req = $DB->query("UPDATE categorie SET categorie = '$categorie' WHERE id = '$id'"); 
            header('Location: modifcat.php?id='.$id.'&modif="ok"');
    } catch (PDOException $e) {
        $erro_message = $e->getMessage;
        echo($erro_message);
        exit(); 
    }