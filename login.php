
<?php
    include 'header.php'; 
?>
    <div class="container" id="corps">
        <div class="row">
        <?php
          
          if(isset($_GET['status']) == 'online' && isset($_SESSION['online'])){
              ?>
              <div class="alert alert-success">
                  vous etes connecter sur l'adresse <?php echo($_SESSION['online']) ?>.
              </div>
              <?php
          }elseif(isset($_GET['error']) == 'pwd'){
            ?>
            <div class="alert alert-danger">
                veuillez verifier le mot de passe car il est incorrect.
            </div>
            <?php
          }elseif(isset($_GET['error']) == 'email'){
            ?>
            <div class="alert alert-danger">
                veuillez verifier l'email car il est incorrect.
            </div>
            <?php
          }
      ?>
            <form action="login_post.php" method="post" class="login">
                <nav>Connexion</nav>
                <fieldset>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pwd">
                    </div>
                    <a href="forget.php" class="nav-link">vous avez oubliés votre mot de passe ? changez le.</a>
                    <button type="submit" class="btn btn-success">Se connecter</button>
                </fieldset>
            </form>
        </div>
        <?php
            include 'footer.php';
        ?>