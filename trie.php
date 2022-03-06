
<?php
    include 'header.php';
?>
    <div class="fond">
        <div>
            <nav data-aos="fade-down">YEKOLA</nav>
            <p data-aos="fade-down">Une plateforme qui vous permet de consulter et télécharger les ouvrages des auteurs
                reconnus</p>
            <form action="search.php" method="get" data-aos="fade-up">
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control"
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
        $id = $_GET['id'];
          
          $req8 = $DB->query("SELECT * FROM categorie WHERE id='$id'");
          
          while( $data8 = $req8 -> fetch()){              
  
        ?>
            <nav class="titre"><?php echo($data8['categorie'])?> </nav>
            <span class="ligne"></span>
            <div class="row">
            <?php
          
            $req1 = $DB->query("SELECT * FROM ouvrages ");
            
            while( $data = $req1 -> fetch()){ 
                if($id== $data['categorie_id']){             
    
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
            }
        }
        ?>
               
            </div>
        </div>
       
        <?php
            include 'footer.php';
        ?>