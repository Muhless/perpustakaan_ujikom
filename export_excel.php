<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

// Include koneksi database
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

// Get periode dari parameter
$periode_filter = isset($_GET['periode']) ? $_GET['periode'] : date('Y-m');
list($tahun_filter, $bulan_filter) = explode('-', $periode_filter);

$nama_bulan = [
    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
    '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
    '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
];

// Query data
$query_hasil = "SELECT * FROM tbl_hasil_saw 
                WHERE DATE_FORMAT(tanggal_analisa, '%Y-%m') = '$periode_filter' 
                ORDER BY ranking ASC";
$result_hasil = mysqli_query($koneksi, $query_hasil);
$total_data = mysqli_num_rows($result_hasil);

if ($total_data == 0) {
    die("Tidak ada data untuk periode yang dipilih!");
}

// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set document properties
$spreadsheet->getProperties()->setCreator('Sistem SAW')
    ->setLastModifiedBy('Admin')
    ->setTitle('Laporan Hasil SAW - ' . $nama_bulan[$bulan_filter] . ' ' . $tahun_filter)
    ->setSubject('Laporan SAW')
    ->setDescription('Laporan hasil analisa SAW periode ' . $nama_bulan[$bulan_filter] . ' ' . $tahun_filter);

// Hitung statistik
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

// Reset pointer
mysqli_data_seek($result_hasil, 0);

// HEADER SECTION
$row = 1;

// Title
$sheet->setCellValue("A{$row}", 'LAPORAN HASIL ANALISA SAW');
$sheet->mergeCells("A{$row}:F{$row}");
$sheet->getStyle("A{$row}")->getFont()->setBold(true)->setSize(16);
$sheet->getStyle("A{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$row++;

// Subtitle
$sheet->setCellValue("A{$row}", 'Periode: ' . $nama_bulan[$bulan_filter] . ' ' . $tahun_filter);
$sheet->mergeCells("A{$row}:F{$row}");
$sheet->getStyle("A{$row}")->getFont()->setBold(true)->setSize(12);
$sheet->getStyle("A{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$row += 2;

// RINGKASAN SECTION
$sheet->setCellValue("A{$row}", 'RINGKASAN HASIL');
$sheet->mergeCells("A{$row}:B{$row}");
$sheet->getStyle("A{$row}")->getFont()->setBold(true)->setSize(12);
$sheet->getStyle("A{$row}:F" . ($row + 6))->getFill()
    ->setFillType(Fill::FILL_SOLID)
    ->getStartColor()->setRGB('E8F4FD');
$row++;

$ringkasan_data = [
    ['Pemenang', $pemenang],
    ['Total Alternatif', $total_data],
    ['Nilai Tertinggi', number_format($nilai_tertinggi, 4)],
    ['Nilai Terendah', number_format($nilai_terendah, 4)],
    ['Rata-rata Nilai', number_format($rata_rata, 4)],
    ['Tanggal Export', date('d/m/Y H:i:s')]
];

foreach ($ringkasan_data as $data) {
    $sheet->setCellValue("A{$row}", $data[0]);
    $sheet->setCellValue("B{$row}", ': ' . $data[1]);
    $sheet->getStyle("A{$row}")->getFont()->setBold(true);
    $row++;
}
$row++;

// TABLE HEADER
$headers = ['Ranking', 'ID Alternatif', 'Nama Alternatif', 'Nilai SAW', 'Status', 'Tanggal Analisa'];
$col_widths = [12, 15, 35, 15, 15, 20];

$col = 'A';
foreach ($headers as $index => $header) {
    $sheet->setCellValue($col . $row, $header);
    $sheet->getStyle($col . $row)->getFont()->setBold(true);
    $sheet->getStyle($col . $row)->getFill()
        ->setFillType(Fill::FILL_SOLID)
        ->getStartColor()->setRGB('366092');
    $sheet->getStyle($col . $row)->getFont()->getColor()->setRGB('FFFFFF');
    $sheet->getStyle($col . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getColumnDimension($col)->setWidth($col_widths[$index]);
    $col++;
}

$header_row = $row;
$row++;

// DATA ROWS
while ($data = mysqli_fetch_array($result_hasil)) {
    // Ranking
    $medal = '';
    if ($data['ranking'] == 1) $medal = '🥇 ';
    elseif ($data['ranking'] == 2) $medal = '🥈 ';
    elseif ($data['ranking'] == 3) $medal = '🥉 ';
    
    $sheet->setCellValue("A{$row}", $medal . '#' . $data['ranking']);
    $sheet->setCellValue("B{$row}", $data['id_alternatif']);
    $sheet->setCellValue("C{$row}", $data['nama_alternatif']);
    $sheet->setCellValue("D{$row}", number_format($data['nilai_saw'], 4));
    
    // Status
    $status = ($data['ranking'] <= 3) ? 'TOP 3' : 'NORMAL';
    if ($data['ranking'] == 1) $status = 'PEMENANG';
    $sheet->setCellValue("E{$row}", $status);
    
    $sheet->setCellValue("F{$row}", date('d/m/Y H:i', strtotime($data['tanggal_analisa'])));
    
    // Highlight pemenang
    if ($data['ranking'] == 1) {
        $sheet->getStyle("A{$row}:F{$row}")->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setRGB('D4EDDA');
        $sheet->getStyle("A{$row}:F{$row}")->getFont()->setBold(true);
    }
    
    // Center alignment untuk beberapa kolom
    $sheet->getStyle("A{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle("B{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle("D{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle("E{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle("F{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    
    $row++;
}

$last_row = $row - 1;

// BORDERS untuk tabel
$borderStyle = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['rgb' => '000000']
        ]
    ]
];
$sheet->getStyle("A{$header_row}:F{$last_row}")->applyFromArray($borderStyle);

// FOOTER
$row += 2;
$sheet->setCellValue("A{$row}", 'Catatan:');
$sheet->getStyle("A{$row}")->getFont()->setBold(true);
$row++;

$catatan = [
    '• Laporan ini dibuat secara otomatis oleh sistem SAW',
    '• Data yang ditampilkan merupakan hasil analisa untuk periode ' . $nama_bulan[$bulan_filter] . ' ' . $tahun_filter,
    '• Ranking ditentukan berdasarkan nilai SAW tertinggi',
    '• Dokumen ini digenerate pada: ' . date('d/m/Y H:i:s')
];

foreach ($catatan as $note) {
    $sheet->setCellValue("A{$row}", $note);
    $sheet->getStyle("A{$row}")->getFont()->setSize(9)->getColor()->setRGB('666666');
    $row++;
}

$spreadsheet->setActiveSheetIndex(0);

$filename = 'Laporan_SAW_' . $periode_filter . '_' . date('Ymd_His') . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

header('Cache-Control: max-age=1');

header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

$writer = new Xlsx($spreadsheet);

$log_query = "INSERT INTO log_export (jenis_export, periode, tanggal_export, filename) 
              VALUES ('EXCEL', '$periode_filter', NOW(), '$filename')";

$writer->save('php://output');
exit;
?>