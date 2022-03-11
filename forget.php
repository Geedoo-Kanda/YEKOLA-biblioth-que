
<?php
    include 'header.php'; 
?>
    <div class="container" id="corps">
        <div class="row">
            <form action="forget_post.php" method="post" class="login">
                <nav>Entrez votre adresse mail</nav>
                <fieldset>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                    <span class="alert alert-warning">Vous allez recevoir le lien de modification de votre mot de passe sur cette adresse mail</span>
                    </div>
                    <button type="submit" class="btn btn-success">Continuer</button>
                </fieldset>
            </form>
        </div>
        <?php
            include 'footer.php';
        ?>