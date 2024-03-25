<?php
require_once 'vendor/autoload.php';
require_once 'lib/common.php';
require_once 'lib/generatePDF.php';
use chillerlan\QRCode\QRCode;

$userName = $_POST['name'];
$eventName = $_POST['event'];
$eventDescription = $_POST['description'];
$eventLocation = $_POST['location'];
$eventDate = $_POST['date'];

$data   = 'https://damianobacci.net';
$qrcode = (new QRCode())->render($data);

// Generate the HTML content
$htmlContent = "<html><head><title>Event Ticket</title></head><body>";
$htmlContent .= "<h2>" . htmlspecialchars($userName) . "</h2>";
$htmlContent .= "<h3>" . htmlspecialchars($eventName) . "</h3>";
$htmlContent .= "<p>" . htmlspecialchars($eventDescription) . "</p>";
$htmlContent .= "<p>" . htmlspecialchars($eventLocation) . "</p>";
$htmlContent .= "<p>" . htmlspecialchars($eventDate) . "</p>";
$htmlContent .= '<img src="' . $qrcode . '" alt="QR Code" width="200px" />';
$htmlContent .= "</body></html>";

// Call the createPDF function
createPDF($htmlContent);
