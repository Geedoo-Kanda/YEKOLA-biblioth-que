<?php
session_start();

if($_SESSION['online']){
    
    $nom_ouvrage = $_POST['nom_ouvrage'];
    $nom_auteur = $_POST['nom_auteur'];
    $description = $_POST['description'];
    $categorie = $_POST['categorie'];

    $photo = 'affiche/' . $_FILES['affiche']['name'];
    move_uploaded_file($_FILES['affiche']['tmp_name'], $photo);

    $livre = 'pdf/' . $_FILES['formFile']['name'];
    move_uploaded_file($_FILES['formFile']['tmp_name'], $livre);

    $host ='localhost';
    $username = 'root';
    $password = '';
    $database = 'yekola';
  
    try {
        $veri = $_SESSION['online'];

        $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
        
        $req1 = $DB->query("SELECT * FROM users WHERE email = '$veri'");
        while( $data = $req1 -> fetch()){

            $id = $data['id'];
            $req = $DB->prepare("INSERT INTO ouvrages (titre, auteur, description, photo, livre, categorie_id, users_id)
            VALUES(:titre, :auteur, :description, :photo, :livre, :categorie_id, :users_id)");
            
            $rep = $req->execute(array(
                'titre'  =>  $nom_ouvrage,
                'auteur' => $nom_auteur,
                'description'  => $description,
                'photo'  => $photo,
                'livre'  => $livre,
                'categorie_id'  => $categorie,
                'users_id' => $id
            ));
        } 
        if($rep == true){
            header("Location: poster.php?status='ok'");
        }else{
            echo('zoba');
        }
    } catch (PDOException $e) {
        $erro_message = $e->getMessage;
        echo($erro_message);
        exit(); 
    }
    
    }else{
        header('Location: login.php');
    }
