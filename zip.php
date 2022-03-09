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

    $req1 = $DB->query("SELECT * FROM ouvrages");
    $ids = array_keys($_SESSION['panier']);

    $zip = new ZipArchive();
    if($zip->open("yekola.zip", ZipArchive::CREATE)){
        while ($data = $req1->fetch()) {
            for ($i=0; $i < count($ids) ; $i++) { 
                if($ids[$i] == $data['id']){
                    $livre = $data['livre'];
                    $zip->addFile("$livre");
                }
            }
        }
        $zip->close();
    }
    header('Location: addBdDownload.php');
    