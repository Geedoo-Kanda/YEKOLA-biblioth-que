<?php 
 session_start();

$email = $_POST['email'];
$pwd = $_POST['pwd'];

    $host ='localhost';
    $username = 'root';
    $password = '';
    $database = 'yekola';

    try {
        $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
        $req = $DB->query("SELECT * FROM users");
    
        while( $data = $req -> fetch()){
        
            if($email == $data['email']){
                if (password_verify($pwd, $data['password'])) {
                    $_SESSION['online'] = $email;
                    header('Location: login.php?status=online');
                    break;
                }else{
                    header('Location: login.php?error=pwd');
                }
            }else{
                header('Location: login.php?error=email');
            }
        } 

    } catch (PDOException $e) {
        $erro_message = $e->getMessage;
        echo($erro_message);
        exit(); 
    }

