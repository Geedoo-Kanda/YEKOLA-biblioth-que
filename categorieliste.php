
<?php
include 'header.php';
?>
    <div class="container" id="corps">
        <div class="row">
        <?php
          
          if(isset($_GET['delete']) == 'ok'){
              ?>
              <div class="alert alert-success">
                  vous avez retiré une categorie.
              </div>
              <?php
          }
      ?>
            <table class="table">
                <thead>
                    <tr>
                        <th class="aler alert-danger">#</th>
                        <th class="aler alert-danger">Nom</th>
                        <th class="aler alert-danger">Poster le </th>
                        <th class="aler alert-danger">Modif</th>
                        <th class="aler alert-danger">Delete</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
          $req1 = $DB->query("SELECT * FROM categorie ORDER BY id DESC");
          $num = 1;
          while( $data = $req1 -> fetch()){      
            ?>
                    <tr>
                        <th class="alert alert-success"><?php echo($num)?></th>
                        <th class="alert alert-success"><?php echo(strtoupper($data['categorie']))?></th>
                        <th class="alert alert-success"><?php echo($data['create_at'])?></th>
                        <th class="alert alert-success"><a href="modifcat.php?id=<?php echo($data['id'])?>"><span class="fa fa-pen-alt"></span></a></th>
                        <th class="alert alert-success"><a href="deletcategorie.php?id=<?php echo($data['id'])?>"><span class="fa fa-trash"></span></a></th>
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