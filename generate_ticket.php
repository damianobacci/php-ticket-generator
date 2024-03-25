<?php
require_once 'lib/common.php';
use chillerlan\QRCode\{QRCode};
require_once 'vendor/autoload.php';


$userName = $_POST['name'];
$eventName = $_POST['event'];

$pdo = getPDO();
$eventData = fetchSpecificEvent($pdo, $eventName);

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
        <h2><?php echo $userName ?></h2>
        <h3><?php echo $eventName ?></h3>
        <p><?php echo $eventData["description"] ?></p>
        <div>
            <?php printf('<img src="%s" alt="QR Code" width="200px" />', $qrcode); ?>
        </div>
    </body>
</html>

