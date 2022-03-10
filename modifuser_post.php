<?php 
session_start();
$email = $_POST['email'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

    $host ='localhost';
    $username = 'root';
    $password = '';
    $database = 'yekola';

    try {
        $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
        
        $id = null;
        $req5 = $DB->query("SELECT * FROM users");
        while( $data5 = $req5 -> fetch()){
            if($_SESSION['online'] == $data5['email']){
                $id = $data5['id'];
            }
        }
        $req = $DB->query("UPDATE users SET nom = '$nom', prenom = '$prenom', email = '$email' WHERE id = '$id'"); 
        header('Location: modifuser.php?id='.$id.'&modif="ok"');
            
    } catch (PDOException $e) {
        $erro_message = $e->getMessage;
        echo($erro_message);
        exit(); 
    }