
<?php
include 'header.php';
?>
    <div class="container" id="corps">
        <div class="row">
        <?php
          $req1 = $DB->query("SELECT * FROM ouvrages LIMIT 0,20");
          
          while( $data = $req1 -> fetch()){     
              
            if($data['id'] == $_GET['id']){  
            ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-6 detail">
                <h1><?php echo($data['titre'])?></h1>
                <h2>Auteur : <?php echo($data['auteur'])?></h2>

                <p><?php echo($data['description'])?></p>
                <div class="download"> 
                    <a href="addpanier.php?id=<?php echo($data['id'])?> " class="btn btn-outline-success"><span class="fa fa-cart-plus"></span> Ajouter au panier</a>
                    <?php 
                    $TelLivres = null;
                    $req1_1 = $DB->query("SELECT * FROM telechargements");
                    while( $data1_1 = $req1_1 -> fetch()){
                        $TelLivres .= ','.$data1_1['ouvrages_id'];
                    }
                    $count = 0;
                    $tabLivres = explode(',', $TelLivres);
                    for ($i=0; $i < count($tabLivres); $i++) { 
                        if($tabLivres[$i] == $_GET['id']){
                            $count += 1;
                        }
                       
                    }
                        ?>
                    <div><span class="fa fa-download"></span>    <?php echo($count)?> </div>
                </div>
                   
            </div>
            <div class="pdf col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <iframe src="<?php echo($data['livre'])?>" frameborder="0" width="100%" height="700px" max-heigth="100%" type="application/pdf"></iframe>
            </div>
            <?php
            }}
        ?>
        </div>
        <?php
            include 'footer.php';
        ?>