
<?php
    include 'header.php';
?>
    <div class="container" id="corps">
        <div class="row">
        <?php
          
          if(isset($_GET['status']) == 'online' && isset($_SESSION['online'])){
              ?>
              <div class="alert alert-success">
                  vous avez un nouveau compte et vous etes connecter sur l'adresse <?php echo($_SESSION['online']) ?>.
              </div>
              <?php
          }elseif(isset($_GET['error']) == 'pwd'){
            ?>
            <div class="alert alert-danger">
                veuillez reverifier votre mot de passe entré puis le confirmer.
            </div>
            <?php
          }elseif(isset($_GET['erroremail']) == 'email'){
            ?>
            <div class="alert alert-danger">
                veuillez changer l'email car il appartient déjà à un autre abonné.
            </div>
            <?php
          }
      ?>
            <form action="logup_post.php" method="POST" class="login">
                <nav>Inscription</nav>
                <fieldset>
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" name="prenom">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd2" class="form-label">Confirmer password</label>
                        <input type="password" class="form-control" name="pwd2">
                    </div>
                    <button type="submit" class="btn btn-success" name="envoyer">S'inscrire</button>
                </fieldset>
            </form>
        </div>
        <?php
            include 'footer.php';
        ?>