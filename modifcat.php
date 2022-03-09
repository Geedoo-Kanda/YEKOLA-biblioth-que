
<?php
    include 'header.php';
   
            ?>
        
    <div class="container" id="corps">
        <div class="row">
        <?php
        if(isset($_GET['modif']) == 'ok'){
            ?>
            <div class="alert alert-success">
                Une categorie a été modifier.
            </div>
            <?php
        }
           if(isset($_SESSION['online'])){
            $veri = $_SESSION['online'];
            $req3 = $DB->query("SELECT * FROM users WHERE email = '$veri'");   
            $req4 = $DB->query("SELECT * FROM categorie");   
            while( $data3 = $req3 -> fetch()){
                if($data3['status'] == 1){
                    
                    while( $data4 = $req4 -> fetch()){
        ?>
            <form action="modifcat_post.php" method="post" class="login">
                <nav>Modifier une categorie</nav>
                <fieldset>
                    <div class="form-group">
                        <label for="categorie" class="form-label">Nom de la categorie</label>
                        <input type="text" class="form-control" name="categorie" value="<?php echo($data4['categorie'])?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo($data4['id'])?>">
                    <button type="submit" class="btn btn-success">Modifier</button>
                </fieldset>
            </form>
            <a href="categorieliste.php" class="nav-link alert alert-success" style="margin-top : 50px">
            <span class="fa fa-link"></span>
            voir toutes les categories</a>
            <?php
            }
        }
        }
    }else{
        ?>
    <script type="text/javascript"> 
            location.href='javascript:history.back()';
    </script>
<?php
    }
        ?>
        </div></div>
        <?php
            include 'footer.php';
        ?>