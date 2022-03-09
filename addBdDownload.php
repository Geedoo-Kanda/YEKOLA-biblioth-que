<?php
session_start();
require 'panier.class.php';
$panier = new panier();

$host ='localhost';
$username = 'root';
$password = '';
$database = 'yekola';

 $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
 array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 

 if($_SESSION['panier']){
    $req1 = $DB->query("SELECT * FROM ouvrages");
    $ids = array_keys($_SESSION['panier']);
    $tab = array();
    while ($data = $req1->fetch()) {
        for ($i=0; $i < count($ids) ; $i++) { 
            if($ids[$i] == $data['id']){
                $livre = $data['id'];
                array_push($tab, $livre);
            }
        }
    }
    $livres = implode(',', $tab);
    $veri = $_SESSION['online'];
    $req5 = $DB->query("SELECT * FROM users WHERE email = '$veri'");
        while( $data5 = $req5 -> fetch()){
            $id = $data5['id'];
            
            $req = $DB->prepare("INSERT INTO telechargements (users_id, ouvrages_id)
            VALUES(:users_id, :ouvrages_id)");
            
            $rep = $req->execute(array(
                'users_id' => $id,
                'ouvrages_id' => $livres
            ));
        } 
        unset($_SESSION['panier']);
        header('Location: download.php');
}        