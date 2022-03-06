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
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free\css\all.min.css">
    <link rel="stylesheet" href="aos-master/dist/aos.css">

    <title>YEKOLA</title>

</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">
                YEKOLA
            </a>

            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#liens">
                <span class="fa fa-align-justify"></span>
            </button>

            <div class="collapse navbar-collapse" id="liens">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Acceuil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Categories
                        </a>
                        <div class="dropdown-menu">
                        <?php 
                            $req6 = $DB->query("SELECT * FROM categorie");   
                            while( $data6 = $req6 -> fetch()){
                                ?>
                                <a class="dropdown-item" href="trie.php?id=<?php echo($data6['id'])?>"><?php echo($data6['categorie'])?></a>
                            <?php
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Livres <span class="badge badge-success"><i class="fa fa-shopping-cart"></i> <?php 
                            if(!empty($_SESSION['panier'])){
                                echo(array_sum($_SESSION['panier']));
                            }?></span>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <div class="scrollable-menu">
                            <?php  
                           
                          if(!empty($_SESSION['panier'])){
                            $ids = array_keys($_SESSION['panier']);
    
                            $req5 = $DB->query("SELECT * FROM ouvrages WHERE id IN(".implode(',',$ids).") ");
                            while($livres = $req5->fetch()){
                       ?>
                                <div class="divise" >
                                
                                    <div>
                                        <img src="<?php echo($livres['photo'])?>" alt="" srcset="">
                                    </div>
                                    <div class="text-center">
                                        <nav><?php echo(strtolower($livres['titre']))?></nav>
                                        <small> ~<?php echo(strtolower($livres['auteur']))?></small>
                                    </div>
                                    <div class="text-center">
                                    <a href="delpanier.php?id=<?php echo($livres['id'])?> ">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    </div>
                                </div>
                                <?php  
                           }
                        }
                       ?>
                       </div>
                            <div class="dropdown-divider"></div>
                            <div class="divise1">
                                <div>
                                <?php 
                                if (array_sum($_SESSION['panier']) >= 1) {
                                
                                if(isset($_SESSION['online'])){
                                 ?>
                                    <a type="botton" href="zip.php" class="btn btn-success nav-link">Valider le panier</a>
                                    <?php                                  
                                } else{ ?>
                                    <a type="botton" href="login.php" class="btn btn-outline-danger nav-link">connectez vous avant de valider le panier</a>
                            <?php  }
                            }else{
                                ?>
                                    <button type="botton" class="alert alert-danger">Le panier est vide</button>
                            <?php 
                            }
                             ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php if(isset($_SESSION['online'])){
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <?php  
                           
                            $veri = $_SESSION['online'];
                            $req1 = $DB->query("SELECT * FROM users WHERE email = '$veri'");
                            
                            while( $data = $req1 -> fetch()){
                                $user = $data['nom'].' '. $data['prenom'];
                                echo(strtoupper($user));
                                
                            }
                        ?>
                            </a>
                            <div class="dropdown-menu">
                                <?php  
                           
                           $veri = $_SESSION['online'];
                           $req3 = $DB->query("SELECT * FROM users WHERE email = '$veri'");   
                                while( $data3 = $req3 -> fetch()){
                                    if($data3['status'] == 1){
                                        ?>
                                        <a class="dropdown-item" href="ouvrages.php">Ouvrage enligne</a>
                                        <a class="dropdown-item" href="poster.php">Poster un ouvrage</a>
                                        <a class="dropdown-item" href="users.php">Abonnés</a>
                                        <a class="dropdown-item" href="categorie.php">Gerer les categorie</a>
                                        <a class="dropdown-item" href="telechargement.php">Telechargement</a>
                                        <?php
                                    }else{
                                        ?>
                                        <a class="dropdown-item" href="profil.php">Profil</a>
                                        <?php
                                    }
                                        
                                }
                            ?>
                                <a class="dropdown-item" href="logout.php">Deconnexion</a>
                                
                            </div>
                        </li>
                        <?php
                    } else{
                        ?>
                        <li class="nav-item">
                            <a type="button" href="login.php" class="btn btn-outline-success nav-link">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a type="button" href="logup.php" class="btn btn-primary nav-link">S'inscrire</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>