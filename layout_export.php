<?php
include 'conn/koneksi.php';

$tabel = 'SELECT * FROM tbl_alternatif ORDER BY ranking';
$query = mysqli_query($koneksi, $tabel) or exit(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html>
<head>
  <title>Hasil SAW</title>
  <style>
    body { font-family: sans-serif; }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }
    h2 {
      text-align: center;
    }
  </style>
</head>
<body>
  <h2>Hasil Analisa Metode SAW</h2>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Alternatif</th>
        <th>Nilai SAW</th>
        <th>Ranking</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
while ($a = mysqli_fetch_array($query)) { ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $a['nama_alternatif']; ?></td>
          <td><?php echo number_format($a['nilai_saw'], 2); ?></td>
          <td><?php echo $a['ranking']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
