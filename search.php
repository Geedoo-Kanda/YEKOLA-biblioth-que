
<?php
    include 'header.php';
?>
    <div class="fond">
        <div>
            <nav data-aos="fade-down">YEKOLA</nav>
            <p data-aos="fade-down">Une plateforme qui vous permet de consulter et télécharger les ouvrages des auteurs
                reconnus</p>
            <form action="" method="get" data-aos="fade-up">
                <div class="input-group">
                    <input type="tel" name="search" id="search" class="form-control"
                        placeholder="Rechercher un ouvrage">
                    <div class="input-group-append baseline">
                        <span class="input-group-text">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <img src="img/1F007A.svg" alt="" srcset="">
    </div>

    <div class="corps">
        <div class="container">
        <?php
          
          $host ='localhost';
          $username = 'root';
          $password = '';
          $database = 'yekola';

          $search = $_GET['search'];
      
          $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
          array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING ));              
          $count = $DB->query("SELECT count(*) FROM ouvrages WHERE titre LIKE '%$search%' ")->fetchColumn();
  
            ?>
            <nav class="titre">Resultats <?php echo($count)?></nav>
            <span class="ligne"></span>
            <div class="row">
            <?php
          
            $req1 = $DB->query("SELECT * FROM ouvrages WHERE titre LIKE '%$search%' LIMIT 0,20");
            
            while( $data = $req1 -> fetch()){              
    
              ?>
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" data-aos="fade-up">
                    <div class="article">
                        <a href="detail.php?id=<?php echo($data['id'])?> ">
                            <img src="<?php echo($data['photo'])?>" alt="" srcset="">
                        </a>
                        <a href="addpanier.php?id=<?php echo($data['id'])?> "><span class="fa fa-cart-plus"></span></a>
                        <nav><?php echo($data['titre'])?></nav>
                        <div class="text-right">
                            <small> ~<?php echo($data['auteur'])?></small>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
               
            </div>
        </div>
       
        <?php
            include 'footer.php';
        ?>