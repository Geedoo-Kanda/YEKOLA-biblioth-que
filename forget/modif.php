<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free\css\all.min.css">
    <link rel="stylesheet" href="../aos-master/dist/aos.css">

    <title>YEKOLA</title>
</head>
<body>
<div class="container" id="corps">
        <div class="row">
            <?php 
                if(isset($_GET['userpwdmodif'])){
                    ?>
                    <form action="modif_post.php" method="post" class="login">
                    <nav>Modifier votre mot de passe</nav>
                    <fieldset>
                        <div class="form-group">
                            <label for="pwd" class="form-label">Password</label>
                            <input type="password" class="form-control" name="pwd">
                        </div>
                        <div class="form-group">
                            <label for="confirm" class="form-label">Confirmation</label>
                            <input type="password" class="form-control" name="confirm">
                        </div>
                        <input type="hidden" name ="user" value="<?php echo($_GET['userpwdmodif'])?>">
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </fieldset>
                </form>
                    <?php
                }else{
                    ?>
                    <span class="alert alert-danger">
                        le lien est conrrompu, veillez reverifier puis ressayer.
                    </span>
                    <?php
                }
            ?>
        </div>
</body>
</html>