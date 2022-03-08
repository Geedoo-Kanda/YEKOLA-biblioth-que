
<?php
include 'header.php';
?>
    <div class="container" id="corps">
        <div class="row">
        <?php
          
          if(isset($_GET['delete']) == 'ok'){
              ?>
              <div class="alert alert-success">
                  vous avez retiré un ouvrage.
              </div>
              <?php
          }
      ?>
            <table class="table">
                <thead>
                    <tr>
                        <th class="aler alert-danger">#</th>
                        <th class="aler alert-danger">Titre</th>
                        <th class="aler alert-danger">Auteur</th>
                        <th class="aler alert-danger">Categorie</th>
                        <th class="aler alert-danger">Description</th>
                        <th class="aler alert-danger">Poster le </th>
                        <th class="aler alert-danger">Voir</th>
                        <th class="aler alert-danger">Modif</th>
                        <th class="aler alert-danger">Delete</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
          $req1 = $DB->query("SELECT * FROM ouvrages ORDER BY id DESC");
          $num = 1;
          while( $data = $req1 -> fetch()){      
            ?>
                    <tr>
                        <th class="alert alert-success"><?php echo($num)?></th>
                        <th class="alert alert-success"><?php echo(strtoupper($data['titre']))?></th>
                        <th class="alert alert-success"><?php echo(strtoupper($data['auteur']))?></th>
                        <?php 
                            $req6 = $DB->query("SELECT * FROM categorie");   
                            while( $data6 = $req6 -> fetch()){
                                if($data['categorie_id'] == $data6['id']){
                                ?>
                                <th class="alert alert-success"><?php echo(strtoupper($data6['categorie']))?></th>
                            <?php
                                }
                            }
                            ?>
                                               
                        <th class="alert alert-success text-justify"><?php echo(substr($data['description'], 0,300).'...')?></th>
                        <th class="alert alert-success"><?php echo($data['create_at'])?></th>
                        <th class="alert alert-success"><a href="detail.php?id=<?php echo($data['id'])?>"><span class="fa fa-plus"></span></a></th>
                        <th class="alert alert-success"><a href="modiflivre.php?id=<?php echo($data['id'])?>"><span class="fa fa-pen-alt"></span></a></th>
                        <th class="alert alert-success"><a href="deletelivre.php?id=<?php echo($data['id'])?>"><span class="fa fa-trash"></span></a></th>
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