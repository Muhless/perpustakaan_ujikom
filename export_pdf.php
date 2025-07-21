<?php

require 'vendor/autoload.php'; // Pastikan path ini benar

use Dompdf\Dompdf;
use Dompdf\Options;

// Optional: untuk support gambar, font, dll
$options = new Options();
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);

// Ambil HTML dari file
ob_start();
include 'layout_export.php'; // Pastikan path ini benar
$html = ob_get_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Tampilkan PDF di browser
$dompdf->stream('hasil_analisa_saw.pdf', ['Attachment' => false]);
// Jika ingin langsung download, ganti false jadi true
