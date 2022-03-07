<?php
require 'panier.class.php';
$panier = new panier();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $panier->del($id);
?>
    <script type="text/javascript"> 
             location.href='javascript:history.back()';
    </script>
<?php    
}