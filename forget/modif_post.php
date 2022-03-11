<?php 
        session_start();
    $pwd = $_POST['pwd'];
    $confirm = $_POST['confirm'];
    $user = $_POST['user'];

    $host ='localhost';
    $username = 'root';
    $password = '';
    $database = 'yekola';

    try {
        $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
        
        $id=null;
        $req5 = $DB->query("SELECT * FROM users");
        while( $data5 = $req5 -> fetch()){
            if($user == $data5['email']){
                $id = $data5['id'];
            }
        }
        if($pwd == $confirm){
            $pwdhash = password_hash($pwd, PASSWORD_DEFAULT);
            $req = $DB->query("UPDATE users SET password = '$pwdhash' WHERE id='$id'"); 
            header('Location: success.php?modifpwdconfirm="bien"');
        }else{
            header('Location: modif.php?modif="faux"&userpwdmodif="'.$user.'"');
        }
    } catch (PDOException $e) {
        $erro_message = $e->getMessage;
        echo($erro_message);
        exit(); 
    }