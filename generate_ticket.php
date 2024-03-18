<?php

use chillerlan\QRCode\{QRCode, QROptions};

require_once 'vendor/autoload.php';

$data   = 'https://damianobacci.net';
$qrcode = (new QRCode)->render($data);

// default output is a base64 encoded data URI
printf('<img src="%s" alt="QR Code" width="200px" />', $qrcode);