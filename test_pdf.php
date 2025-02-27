<?php
// Pastikan path ke autoload Composer sesuai dengan struktur project Anda
require_once __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;

// Membuat instance Dompdf
$dompdf = new Dompdf();

// Contoh HTML sederhana
$html = '
<html>
<head>
    <meta charset="UTF-8">
    <title>Test PDF</title>
</head>
<body>
    <h1>Halo dari Dompdf!</h1>
    <p>Jika Anda melihat tulisan ini di PDF, berarti Dompdf berfungsi.</p>
</body>
</html>
';

// Memuat HTML ke Dompdf
$dompdf->loadHtml($html);

// Aktifkan pemanggilan resource eksternal jika dibutuhkan (gambar/CSS online)
$dompdf->set_option('isRemoteEnabled', true);

// Atur ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'portrait');

// Render ke PDF
$dompdf->render();

// Tampilkan PDF di browser
$dompdf->stream("test_pdf.pdf");
