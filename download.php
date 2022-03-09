<?php
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Transfert-Encoding: Binary');
header('Content-disposition: attachement; filename="yekola.zip"');
header('Expire: 0');
header('Cache-Control:must-revalidate');
header('Pragma: public');
header('Content-Length:'.filesize('yekola.zip'));
echo readfile('yekola.zip');
unlink('yekola.zip'); 
exit();