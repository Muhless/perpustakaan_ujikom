<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (file_exists('koneksi.php')) {
    include 'koneksi.php';
} elseif (file_exists('../koneksi.php')) {
    include '../koneksi.php';
} elseif (file_exists('conn/koneksi.php')) {
    include 'conn/koneksi.php';
} elseif (file_exists('../conn/koneksi.php')) {
    include '../conn/koneksi.php';
} else {
    die("File koneksi.php tidak ditemukan! Pastikan file koneksi.php ada di folder yang benar.");
}

if (file_exists('header.php')) {
    include 'header.php';
} else {
    echo "<!-- Header file tidak ditemukan -->";
}

$bulan_filter = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
$tahun_filter = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
$periode_filter = "$tahun_filter-$bulan_filter";

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

$query_periode = "SELECT DATE_FORMAT(tanggal_analisa, '%Y-%m') as periode,
                         DATE_FORMAT(tanggal_analisa, '%Y') as tahun,
                         DATE_FORMAT(tanggal_analisa, '%m') as bulan,
                         COUNT(*) as jumlah_data
                  FROM tbl_hasil_saw 
                  WHERE tanggal_analisa IS NOT NULL
                  GROUP BY periode, tahun, bulan
                  ORDER BY periode DESC";

                  
$result_periode = mysqli_query($koneksi, $query_periode);
?>

<div class="container-fluid page-body-wrapper">
  
  <!-- sidebar -->
  <?php
  $base_path = '..';
  if (file_exists('../sidebar.php')) {
      include '../sidebar.php';
  } elseif (file_exists('sidebar.php')) {
      include 'sidebar.php';
  } else {
      echo "<!-- Sidebar tidak ditemukan -->";
  }
  ?>
  <!-- end sidebar -->

  <!-- CONTENT -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              
              <!-- Header dengan Info Periode -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h2 class="card-title mb-2">Laporan Hasil SAW - <?php echo $nama_bulan[$bulan_filter] . ' ' . $tahun_filter; ?></h2>
                </div>
                <?php if ($total_data > 0): ?>
                <div class="btn-group" role="group">
                  <a href="../export_pdf_hasil.php?periode<?php echo $periode_filter; ?>" class="btn btn-success" target="_blank">
                    <i class="mdi mdi-file-pdf"></i> Export PDF
                  </a>
                  <a href="../export_excel.php?periode=<?php echo $periode_filter; ?>" class="btn btn-primary" target="_blank">
                    <i class="mdi mdi-file-excel"></i> Export Excel
                  </a>
                </div>
                <?php endif; ?>
              </div>

              <!-- Filter Periode -->
              <div class="row mb-4">
                <div class="col-md-12">
                  <div class="card bg-light">
                    <div class="card-body py-3">
                      <form method="GET" action="">
                        <div class="row align-items-end">
                          <div class="col-md-3">
                            <label class="form-label fw-bold">Pilih Bulan:</label>
                            <select name="bulan" class="form-control">
                              <?php foreach ($nama_bulan as $num => $nama): ?>
                                <option value="<?php echo $num; ?>" <?php echo ($bulan_filter == $num) ? 'selected' : ''; ?>>
                                  <?php echo $nama; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label class="form-label fw-bold">Pilih Tahun:</label>
                            <select name="tahun" class="form-control">
                              <?php 
                              $tahun_sekarang = date('Y');
                              for ($i = $tahun_sekarang; $i >= ($tahun_sekarang - 5); $i--): ?>
                                <option value="<?php echo $i; ?>" <?php echo ($tahun_filter == $i) ? 'selected' : ''; ?>>
                                  <?php echo $i; ?>
                                </option>
                              <?php endfor; ?>
                            </select>
                          </div>
                         
                          <div class="col-md-3">
                            <a href="?" class="btn btn-secondary w-100">
                              <i class="mdi mdi-refresh"></i> Reset
                            </a>
                          </div>
                           <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">
                              <i class="mdi mdi-magnify"></i> Tampilkan
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                
             
              </div>

              <?php if ($total_data > 0): ?>
              
              <div class="row mb-4">
                <?php
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
                ?>
                
                <div class="col-md-3">
                  <div class="card text-center bg-success text-white">
                    <div class="card-body py-3">
                      <h5 class="mb-1"><?php echo $pemenang; ?></h5>
                      <small>🏆 Pemenang</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card text-center bg-primary text-white">
                    <div class="card-body py-3">
                      <h5 class="mb-1"><?php echo number_format($nilai_tertinggi, 4); ?></h5>
                      <small>📈 Nilai Tertinggi</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card text-center bg-warning text-white">
                    <div class="card-body py-3">
                      <h5 class="mb-1"><?php echo number_format($rata_rata, 4); ?></h5>
                      <small>📊 Rata-rata</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card text-center bg-secondary text-white">
                    <div class="card-body py-3">
                      <h5 class="mb-1"><?php echo $total_data; ?></h5>
                      <small>📋 Total Alternatif</small>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tabel Hasil -->
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center" width="60">Ranking</th>
                      <th class="text-center" width="100">ID</th>
                      <th>Nama Alternatif</th>
                      <th class="text-center" width="150">Nilai SAW</th>
                      <th class="text-center" width="120">Status</th>
                      <th class="text-center" width="150">Tanggal Analisa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($data = mysqli_fetch_array($result_hasil)): ?>
                    <tr <?php echo ($data['ranking'] == 1) ? 'class="table-success"' : ''; ?>>
                      <td class="text-center">
                        <?php 
                        $rank_badge = '';
                        $rank_icon = '';
                        if ($data['ranking'] == 1) {
                            $rank_badge = 'badge-success';
                            $rank_icon = '🥇';
                        } elseif ($data['ranking'] == 2) {
                            $rank_badge = 'badge-warning';
                            $rank_icon = '🥈';
                        } elseif ($data['ranking'] == 3) {
                            $rank_badge = 'badge-info';
                            $rank_icon = '🥉';
                        } else {
                            $rank_badge = 'badge-secondary';
                            $rank_icon = '';
                        }
                        ?>
                        <span class="badge <?php echo $rank_badge; ?> fs-6">
                          <?php echo $rank_icon; ?> #<?php echo $data['ranking']; ?>
                        </span>
                      </td>
                      <td class="text-center">
                        <code><?php echo $data['id_alternatif']; ?></code>
                      </td>
                      <td>
                        <strong><?php echo $data['nama_alternatif']; ?></strong>
                        <?php if ($data['ranking'] == 1): ?>
                          <span class="badge badge-success ms-2">TERPILIH</span>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <span class="badge badge-primary fs-6">
                          <?php echo number_format($data['nilai_saw'], 4); ?>
                        </span>
                      </td>
                      <td class="text-center">
                        <?php if ($data['ranking'] <= 3): ?>
                          <span class="badge badge-success">TOP 3</span>
                        <?php else: ?>
                          <span class="badge badge-secondary">NORMAL</span>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <small>
                          <?php echo date('d/m/Y', strtotime($data['tanggal_analisa'])); ?><br>
                          <?php echo date('H:i', strtotime($data['tanggal_analisa'])); ?>
                        </small>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>

         
              <?php else: ?>
              
              <div class="text-center py-5">
                <i class="mdi mdi-calendar-remove mdi-72px text-muted mb-3"></i>
                <h4 class="text-muted">Belum Ada Hasil Analisa</h4>
                <p class="text-muted">
                  Belum ada hasil analisa SAW untuk periode <strong><?php echo $nama_bulan[$bulan_filter] . ' ' . $tahun_filter; ?></strong>.<br>
                  Silakan lakukan analisa SAW terlebih dahulu atau pilih periode lain.
                </p>
                <div class="mt-3">
                  <a href="analisa.php" class="btn btn-primary me-2">
                    <i class="mdi mdi-calculator"></i> Mulai Analisa SAW
                  </a>
                  <a href="?" class="btn btn-secondary">
                    <i class="mdi mdi-calendar-today"></i> Kembali ke Bulan Ini
                  </a>
                </div>
              </div>
              
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.badge.fs-6 {
    font-size: 0.875rem !important;
    padding: 0.5rem 0.75rem;
}

.table td {
    vertical-align: middle;
}

.table-success {
    background-color: #d4edda !important;
}

.btn-group .btn {
    margin-left: 5px;
}

.card {
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.bg-light {
    background-color: #f8f9fa !important;
}

code {
    background-color: #e9ecef;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.875rem;
}

.alert {
    border-radius: 8px;
}

.form-label.fw-bold {
    font-weight: 600 !important;
    margin-bottom: 0.5rem;
}

.mdi-72px {
    font-size: 72px;
}
</style>