<?php
require 'panier.class.php';
$panier = new panier();
$host ='localhost';
$username = 'root';
$password = '';
$database = 'yekola';



if(isset($_GET['id'])){
    $id = $_GET['id'];

    $DB = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING )); 
    
    $req1 = $DB->query("SELECT * FROM ouvrages WHERE id = '$id'")->fetch();
    
    $panier->add($req1['id']);
    ?>
    <script type="text/javascript"> 
            location.href='javascript:history.back()';
    </script>
<?php
}