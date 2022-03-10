
<?php
    include 'header.php';
    if(isset($_SESSION['online'])){
?>
    <div class="container" id="corps">
        <div class="row">
        <?php
          
          if(isset($_GET['modif']) == 'ok'){
              ?>
              <div class="alert alert-success">
                  La modification a reussi.
              </div>
              <?php
          }
      ?>
            <form action="modifuser_post.php" method="POST" class="login">
                <nav>Modification</nav>
                <fieldset>
                <?php
                $id = $_GET['id'];
                $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
                $req = $DB->query("SELECT * FROM users WHERE id = '$id'");
            
                while( $data = $req -> fetch()){
                ?>
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" value="<?php echo($data['nom'])?>">
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" name="prenom" value="<?php echo($data['prenom'])?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo($data['email'])?>">
                    </div>
                    <button type="submit" class="btn btn-success" name="envoyer">S'inscrire</button>
                </fieldset>
            </form>
        </div>
        <?php
        }
    }else{
        ?>
    <script type="text/javascript"> 
            location.href='login.php';
    </script>
<?php
    }
            include 'footer.php';
        ?>