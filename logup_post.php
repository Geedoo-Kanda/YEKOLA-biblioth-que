<?php 
        session_start();
$email = $_POST['email'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];


if ($pwd == $pwd2) {
    $host ='localhost';
    $username = 'root';
    $password = '';
    $database = 'yekola';

    $pwdhash = password_hash($pwd, PASSWORD_DEFAULT);

    try {
        $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
        
        $req5 = $DB->query("SELECT * FROM users");
        while( $data5 = $req5 -> fetch()){
            if($email != $data5['email']){
                $req = $DB->prepare("INSERT INTO users (nom, prenom, email, password)
                VALUES(:nom, :prenom, :email, :password)");

                $rep = $req->execute(array(
                    'nom'  =>  $nom,
                    'prenom' => $prenom,
                    'email'  => $email,
                    'password' => $pwdhash
                ));
                $_SESSION['online'] = $email;
                header('Location: logup.php?status=online');
            }else{
                header('Location: logup.php?erroremail=email');
                break;
            }
        }
            

    } catch (PDOException $e) {
        $erro_message = $e->getMessage;
        echo($erro_message);
        exit(); 
    }
    /**/
}else{
    header('Location: logup.php?error=pwd');
}
