<?php 
        session_start();
$categorie = $_POST['categorie'];

    $host ='localhost';
    $username = 'root';
    $password = '';
    $database = 'yekola';

    try {
        $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
        
            $req = $DB->prepare("INSERT INTO categorie (categorie)
            VALUES(:categorie)");

            $rep = $req->execute(array(
                'categorie'  =>  $categorie
            ));
            header('Location: categorie.php?add=ok');
    } catch (PDOException $e) {
        $erro_message = $e->getMessage;
        echo($erro_message);
        exit(); 
    }