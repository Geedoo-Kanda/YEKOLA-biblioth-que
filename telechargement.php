
<?php
    include 'header.php'; 
?>
    <div class="container" id="corps">
    <nav class="titre">Les télechargements</nav>
            <span class="ligne"></span>
        <div class="row">
        <table class="table">
                <thead>
                    <tr>
                        <th class="aler alert-danger">#</th>
                        <th class="aler alert-danger">Abonné</th>
                        <th class="aler alert-danger">Email</th>
                        <th class="aler alert-danger">Livres</th>
                        <th class="aler alert-danger">Date</th>
                    </tr>
                </thead>
                
                <tbody>
              <?php 
                $req1 = $DB->query("SELECT * FROM telechargements ORDER BY id DESC");
                $num = 1;
                              
                while( $data = $req1 -> fetch()){    
                    
                    $idtelusers = $data['users_id'];
              ?>
         
                    <tr>
                        <th class="alert alert-success"><?php echo($num)?></th>
                        <?php
                        $req2 = $DB->query("SELECT * FROM users");
                         while( $data2 = $req2 -> fetch()){ 
                             $idusers = $data2['id'];
                             if($idtelusers == $idusers){
                             ?>
                                <th class="alert alert-success"><?php echo(strtoupper($data2['nom'] .' '.$data2['prenom']))?></th>
                                <th class="alert alert-success"><?php echo($data2['email'])?></th>
                                <th class="alert alert-success">
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
                                         
                                        echo($data3['titre'] .' <br>~'. $data3['auteur'].'<br><br>');
                                        }
                                    }
                                }
                             }
                            
                          } 
                          
                        ?>
                        </th>
                        <th class="alert alert-success"><?php echo($data['create_at'])?></th>
                    </tr>
                    <?php
                $num++;
                }
               
               ?>
                </tbody>
            </table>
        </div>
        <?php
            include 'footer.php';
        ?>