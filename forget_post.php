
<?php
    include 'header.php'; 


    $header = "MIME-version : 1.0 \r\n";
    $header .= "From: contact@yekola.com \r\n";
    $header .= 'Content-type : text-html; charset="utf-8"'."\r\n";
    $header .= 'Content-Transfert-Encoding : 8bit';

    $to = "geedookanda06@gmail.com";
    $subjet = "Modification des informations dans le plateforme YEKOLA";

    $message = '
    <html>
        <body>
        <h1>YEKOLA</h1>
            <h2>Une plateforme qui vous permet de consulter et télécharger les ouvrages des auteurs reconnus</h2>
            <h3>Avez vous oublié votre mot de passe? Voulez vous le modifier ?</h3>
            <h4><b>veillez vous rendre sur le lien <a href="forget/modif.php?dfy6416gush41ionv564iuieqjjfiA9456hUTIGkNYFYFVK287ej546hlQLVD451FQ98623SGIHQFUFHQVIOY&userpwdmodif=ok&MOGDWIKLIUSJPDNSKGnhkfdhksbqguyqbfqbufwcxojoseijwuhqQHYQJmoofsq">ici</a></b> afin de le changer</h4>
        </body>
    </html>
    ';

    mail($to, $subjet, $message, $header);

?>

    <div class="container" id="corps">
         <div class="row ">
            <span class="alert alert-success" style="width : 70%">
                <span class="alert alert-warning"><span class="fa fa-exclamation-triangle"></span> Verifiez dans votre compte mail</span>
                <br> <p style="margin-top : 25px">Vous devez normalement recevoir un mail de la part de la plateforme vous permettant d'apporter les modifications necessaires sur votre compte yekola.</p> 
            </span>
        </div>
        <?php
            include 'footer.php';
        ?>