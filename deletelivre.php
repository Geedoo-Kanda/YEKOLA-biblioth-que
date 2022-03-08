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

        $req1 = $DB->query("SELECT * FROM ouvrages WHERE id='$id'");
        while( $data = $req1 -> fetch()){
            $livre = $data['livre'];
            $photo = $data['photo'];
            unlink($livre);
            unlink($photo);
        }
        $req = $DB->query("DELETE FROM ouvrages WHERE id='$id'");
        header('Location: ouvrages.php?delete=ok');

    } catch (PDOException $e) {
        $erro_message = $e->getMessage;
        echo($erro_message);
        exit(); 
    }

