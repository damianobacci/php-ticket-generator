<?php

use chillerlan\QRCode\{QRCode};
require_once 'vendor/autoload.php';

$name = $_POST['name'];
$event = $_POST['event'];

$data   = 'https://damianobacci.net';
$qrcode = (new QRCode)->render($data);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>A blog application</title>
        <?php require 'templates/head.php' ?>
    </head>
    <body>
        <h2><?php echo $name ?></h2>
        <h3><?php echo $event ?></h3>
        <div>
            <?php printf('<img src="%s" alt="QR Code" width="200px" />', $qrcode); ?>
        </div>
    </body>
</html>

