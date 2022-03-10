
<?php
    include 'header.php';
   
            ?>
        
    <div class="container" id="corps">
        <div class="row">
        <?php
        if(isset($_GET['modif']) == 'ok'){
            ?>
            <div class="alert alert-success">
                L'ouvrage est posté. vous pouvez le voir <a href="index.php">sur la page d'acceuil</a>
            </div>
            <?php
        } 
           if(isset($_SESSION['online'])){
            $veri = $_SESSION['online'];
            $req3 = $DB->query("SELECT * FROM telechargements");   
            $req4 = $DB->query("SELECT * FROM users WHERE email = '$veri'");   
            while( $data4 = $req4 -> fetch()){
                
                ?>   
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos="fade-up" style="padding-left:150px">
                    <h3> <strong>Nom : </strong> <?php echo(strtoupper($data4['nom']))?></h3>
                    <h3> <strong>Prenom : </strong> <?php echo(strtoupper($data4['prenom']))?></h3>
                    <h4> <strong>Email : </strong><?php echo($data4['email'])?></h4>
                    <a href="modifuser.php?id=<?php echo($data4['id'])?>" class="btn btn-outline-primary">Modifier mon compte</a>
                </div>    <?php    
            }
        }
    ?>
                
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" data-aos="fade-up" style="margin-top : 50px">
                <nav class="titre">Mes télechargements </nav>
            <span class="ligne"></span>
                <table class="table">
                <thead>
                    <tr>
                        <th class="aler alert-danger">#</th>
                        <th class="aler alert-danger">Livres</th>
                        <th class="aler alert-danger">Auteurs</th>
                        <th class="aler alert-danger">Description</th>
                        <th class="aler alert-danger">Date</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php 
                $email = $_SESSION['online'];    
                $num = 1;
                $req2 = $DB->query("SELECT * FROM users");
                while( $data2 = $req2 -> fetch()){ 
                    $idusers = $data2['id'];
                    if($email == $data2['email']){             
              ?>
         
                    
                        
                        <?php
                             $TelLivres = null;
                             $req1_1 = $DB->query("SELECT * FROM telechargements WHERE users_id = $idusers");
                             while( $data1_1 = $req1_1 -> fetch()){
                                $TelLivres = $data1_1['ouvrages_id'];
                             }
                             $tabLivres = explode(',', $TelLivres);
                             $req3 = $DB->query("SELECT * FROM ouvrages");
                             while( $data3 = $req3 -> fetch()){
                                 $idlivre = $data3['id'];
                                 for ($i=0; $i < count($tabLivres); $i++) { 
                                     if($tabLivres[$i] == $idlivre){
                                        ?>
                                            <tr>
                                                <th class="alert alert-success"><?php echo($num)?></th>
                                                <th class="alert alert-success"><?php echo($data3['titre'])?></th>
                                                <th class="alert alert-success"><?php echo($data3['auteur'])?></th>
                                                <th class="alert alert-success text-justify" style="max-width:500px"><?php echo(substr($data3['description'], 0,300).'...')?></th>
                                                <th class="alert alert-success"><?php echo($data3['create_at'])?></th>
                                            </tr>
                                        <?php
                                        }
                                    }
                                }
                        ?>
                    
                    <?php
                    
                } 
                $num++;
                }
               
               ?>
                </tbody>
               
            </table>
                </div>

        </div>
    </div>
        <?php
            include 'footer.php';
        ?>