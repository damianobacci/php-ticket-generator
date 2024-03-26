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
        <?php require 'templates/navbar.php' ?>
        <header><h1>Your generated ticket!</h1></header>
    <section class="ticket">
        <h3><?php echo $userName ?></h3>
        <h3><?php echo $eventName ?></h3>
        <p><?php echo $eventData["date"] ?>,<?php echo $eventData["location"] ?></p>
        <p><?php echo $eventData["description"] ?></p>
        <div>
            <?php printf('<img class="qr" src="%s" alt="QR Code" width="200px" />', $qrcode); ?>
        </div>
    </section>
    <section>
    <form action="pdf_generation_script.php" method="post">
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($userName); ?>">
        <input type="hidden" name="event" value="<?php echo htmlspecialchars($eventName); ?>">
        <input type="hidden" name="description" value="<?php echo htmlspecialchars($eventData["description"]); ?>">
        <input type="hidden" name="date" value="<?php echo htmlspecialchars($eventData["date"]); ?>">
        <input type="hidden" name="location" value="<?php echo htmlspecialchars($eventData["location"]); ?>">
        <label>Save your ticket: </label>
        <button type="submit">Download PDF</button>
    </form>
    </section>
    </body>
</html>

