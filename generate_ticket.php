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
        <p><?php echo $eventData["date"] ?>,<?php echo $eventData["location"] ?></p>
        <p><?php echo $eventData["description"] ?></p>
        <div>
            <?php printf('<img src="%s" alt="QR Code" width="200px" />', $qrcode); ?>
        </div>
    <form action="pdf_generation_script.php" method="post">
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($userName); ?>">
        <input type="hidden" name="event" value="<?php echo htmlspecialchars($eventName); ?>">
        <input type="hidden" name="description" value="<?php echo htmlspecialchars($eventData["description"]); ?>">
        <input type="hidden" name="date" value="<?php echo htmlspecialchars($eventData["date"]); ?>">
        <input type="hidden" name="location" value="<?php echo htmlspecialchars($eventData["location"]); ?>">
        <button type="submit">Generate PDF</button>
    </form>
    </body>
</html>

