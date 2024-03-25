<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf; 

function createPDF($html) {
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape'); 
    $dompdf->render(); 
    $dompdf->stream(); 
}
