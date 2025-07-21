<?php
require_once('vendor/tecnickcom/tcpdf/tcpdf.php'); 

if (file_exists('koneksi.php')) {
    include 'koneksi.php';
} elseif (file_exists('../koneksi.php')) {
    include '../koneksi.php';
} elseif (file_exists('conn/koneksi.php')) {
    include 'conn/koneksi.php';
} elseif (file_exists('../conn/koneksi.php')) {
    include '../conn/koneksi.php';
} else {
    die("File koneksi.php tidak ditemukan!");
}

$periode_filter = isset($_GET['periode']) ? $_GET['periode'] : date('Y-m');
list($tahun_filter, $bulan_filter) = explode('-', $periode_filter);

$nama_bulan = [
    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
    '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
    '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
];

$query_hasil = "SELECT * FROM tbl_hasil_saw 
                WHERE DATE_FORMAT(tanggal_analisa, '%Y-%m') = '$periode_filter' 
                ORDER BY ranking ASC";
$result_hasil = mysqli_query($koneksi, $query_hasil);
$total_data = mysqli_num_rows($result_hasil);

if ($total_data == 0) {
    die("Tidak ada data untuk periode yang dipilih!");
}

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator('Sistem SAW');
$pdf->SetAuthor('Admin Sistem');
$pdf->SetTitle('Laporan Hasil SAW - ' . $nama_bulan[$bulan_filter] . ' ' . $tahun_filter);
$pdf->SetSubject('Laporan Hasil Analisa SAW');

$pdf->SetHeaderData('', 0, 'LAPORAN HASIL SAW', 'Periode: ' . $nama_bulan[$bulan_filter] . ' ' . $tahun_filter);

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage();

$pdf->SetFont('helvetica', '', 10);

mysqli_data_seek($result_hasil, 0);
$nilai_tertinggi = 0;
$nilai_terendah = 1;
$total_nilai = 0;
$pemenang = '';

while ($stat = mysqli_fetch_array($result_hasil)) {
    if ($stat['ranking'] == 1) $pemenang = $stat['nama_alternatif'];
    if ($stat['nilai_saw'] > $nilai_tertinggi) $nilai_tertinggi = $stat['nilai_saw'];
    if ($stat['nilai_saw'] < $nilai_terendah) $nilai_terendah = $stat['nilai_saw'];
    $total_nilai += $stat['nilai_saw'];
}
$rata_rata = $total_nilai / $total_data;

mysqli_data_seek($result_hasil, 0);

$html = '<style>
    .header { font-size: 16px; font-weight: bold; text-align: center; margin-bottom: 15px; }
    .info-box { border: 1px solid #ddd; padding: 10px; margin-bottom: 15px; }
    .table { border-collapse: collapse; width: 100%; }
    .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: center; }
    .table th { background-color: #f2f2f2; font-weight: bold; }
    .winner { background-color: #d4edda; }
    .text-left { text-align: left; }
</style>';

$html .= '<div class="header">LAPORAN HASIL ANALISA SAW<br>
          Periode: ' . $nama_bulan[$bulan_filter] . ' ' . $tahun_filter . '</div>';

// Info statistik
$html .= '<div class="info-box">
    <strong>RINGKASAN HASIL:</strong><br>
    • Pemenang: <strong>' . $pemenang . '</strong><br>
    • Total Alternatif: <strong>' . $total_data . '</strong><br>
    • Nilai Tertinggi: <strong>' . number_format($nilai_tertinggi, 4) . '</strong><br>
    • Nilai Terendah: <strong>' . number_format($nilai_terendah, 4) . '</strong><br>
    • Rata-rata Nilai: <strong>' . number_format($rata_rata, 4) . '</strong><br>
    • Tanggal Export: <strong>' . date('d/m/Y H:i:s') . '</strong>
</div>';

// Tabel hasil
$html .= '<table class="table">
    <thead>
        <tr>
            <th width="10%">Rank</th>
            <th width="15%">ID Alt</th>
            <th width="40%">Nama Alternatif</th>
            <th width="15%">Nilai SAW</th>
            <th width="20%">Tanggal</th>
        </tr>
    </thead>
    <tbody>';

while ($data = mysqli_fetch_array($result_hasil)) {
    $row_class = ($data['ranking'] == 1) ? ' class="winner"' : '';
    $medal = '';
    if ($data['ranking'] == 1) $medal = '🥇 ';
    elseif ($data['ranking'] == 2) $medal = '🥈 ';
    elseif ($data['ranking'] == 3) $medal = '🥉 ';
    
    $html .= '<tr' . $row_class . '>
        <td>' . $medal . '#' . $data['ranking'] . '</td>
        <td>' . $data['id_alternatif'] . '</td>
        <td class="text-left">' . $data['nama_alternatif'] . '</td>
        <td>' . number_format($data['nilai_saw'], 4) . '</td>
        <td>' . date('d/m/Y', strtotime($data['tanggal_analisa'])) . '</td>
    </tr>';
}

$html .= '</tbody></table>';

// Footer info
$html .= '<br><div style="font-size: 9px; color: #666;">
    <strong>Catatan:</strong><br>
    • Laporan ini dibuat secara otomatis oleh sistem SAW<br>
    • Data yang ditampilkan merupakan hasil analisa untuk periode ' . $nama_bulan[$bulan_filter] . ' ' . $tahun_filter . '<br>
    • Ranking ditentukan berdasarkan nilai SAW tertinggi<br>
    • Dokumen ini digenerate pada: ' . date('d/m/Y H:i:s') . '
</div>';

// Print text using writeHTMLCell()
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$filename = 'Laporan_SAW_' . $periode_filter . '_' . date('Ymd_His') . '.pdf';
$pdf->Output($filename, 'D'); // D = Download

// Log export (optional)
$log_query = "INSERT INTO log_export (jenis_export, periode, tanggal_export, filename) 
              VALUES ('PDF', '$periode_filter', NOW(), '$filename')";
// mysqli_query($koneksi, $log_query); // Uncomment jika ada tabel log

exit;
?>