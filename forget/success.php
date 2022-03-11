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
    <?php if(isset($_GET['modifpwdconfirm']) == "bien"){
        ?>
        <div class="container" id="corps" style="width:60%">
                <div class="row">
                    <span class="alert alert-success">
                        <span class="fa fa-check" style="font-size:25px"></span>
                        Vous venez de modifier les informations à la connexion sur votre compte, tachez de ne pas oublier votre mot de passe cette fois.
                        <br> <p style="margin-top:25px">vous pouvez maintenant vous connectez sur compte en utilisant vos nouvelles informations <a href="../login.php">ici</a></p>
                    </span>
                </div>
        </div>
        <?php
    }else{
        header('Location: ../login.php');
    }
    ?>
</body>
</html>