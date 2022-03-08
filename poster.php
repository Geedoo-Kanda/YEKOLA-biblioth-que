
<?php
    include 'header.php';
   
            ?>
        
    <div class="container" id="corps">
        <div class="row">
        <?php
        if(isset($_GET['status']) == 'ok'){
            ?>
            <div class="alert alert-success">
                L'ouvrage est posté. vous pouvez le voir <a href="index.php">sur la page d'acceuil</a>
            </div>
            <?php
        }
           if(isset($_SESSION['online'])){
            $veri = $_SESSION['online'];
            $req3 = $DB->query("SELECT * FROM users WHERE email = '$veri'");   
            while( $data3 = $req3 -> fetch()){
                if($data3['status'] == 1){
            
        ?>
            <form action="poster_post.php" method="post" class="login" enctype="multipart/form-data">
                <nav>Poster un ouvrage</nav>
                <fieldset>
                    <div class="form-group">
                        <label for="nom_ouvrage" class="form-label">Nom de l'ouvrage</label>
                        <input type="text" class="form-control" name="nom_ouvrage">
                    </div>
                    <div class="form-group">
                        <label for="nom_auteur" class="form-label">Nom auteur</label>
                        <input type="text" class="form-control" name="nom_auteur">
                    </div>
                    <div class="form-group">
                    <label for="categorie" class="form-label">Categorie</label>
                    <select name="categorie" class="form-control">
                        <?php 
                        $req6 = $DB->query("SELECT * FROM categorie");   
                        while( $data6 = $req6 -> fetch()){
                            ?>
                            <option value="<?php echo($data6['id'])?>"><?php echo($data6['categorie'])?></option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" cols="15" rows="5"></textarea>
                    </div> 
                    <div class="form-group">
                        <label for="affiche" class="form-label">Affiche de l'ouvrage</label>
                        <input class="form-control" type="file" name="affiche">
                    </div>
                    <div class="form-group">
                        <label for="ouvrage" class="form-label">Ouvrage (pdf)</label>
                        <input class="form-control" type="file" name="formFile">
                    </div>
                    <button type="submit" class="btn btn-success">Poster</button>
                </fieldset>
            </form>
            <?php
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