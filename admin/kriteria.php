<?php
include 'header.php';
?>

<!-- TODO: DROPDOWN -->
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Halaman Awal</span>
        </a>
      </li>
      <!--  -->
      <li class="nav-item nav-category">Dashboard</li>
      <li class="nav-item">
        <a class="nav-link" href="../dashboard/transaksi.php">
          <i class="menu-icon mdi mdi-clipboard-text"></i>
          <span class="menu-title">Transaksi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../dashboard/pelanggan.php">
          <i class="menu-icon mdi mdi-account"></i>
          <span class="menu-title">Pelanggan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../dashboard/karyawan.php">
          <i class="menu-icon mdi mdi-account-multiple"></i>
          <span class="menu-title">Karyawan</span>
        </a>
      </li>
      <!--  -->
      <!-- FIXME -->
      <li class="nav-item nav-category">Sistem Pendukung Keputusan</li>
      <li class="nav-item">
        <a class="nav-link" href="alternatif.php">
          <i class="menu-icon mdi mdi-format-list-bulleted"></i>
          <span class="menu-title">Alternatif</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kriteria.php">
          <i class="menu-icon mdi mdi-playlist-plus"></i>
          <span class="menu-title">Kriteria</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="nilai.php">
          <i class="menu-icon mdi mdi-check-all"></i>
          <span class="menu-title">Nilai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="metode.php">
          <i class="menu-icon mdi mdi-chart-bar"></i>
          <span class="menu-title">Metode</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hasil.php">
          <i class="menu-icon mdi mdi-crown"></i>
          <span class="menu-title">Hasil</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link mt-5" href="logout.php">
          <i class="menu-icon mdi mdi-logout-variant"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>
      <!-- FIXME -->
    </ul>
  </nav>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Kriteria</h2>
              <div class="row">
                <!-- TODO -->
                <div class="container">
                  <div class="panel panel-container">
                    <div class="bootstrap-table">
                      <a href="kriteria_aksi.php?aksi=tambah" class="btn btn-primary">TAMBAH DATA</a>
                      <hr>
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Nama Kriteria</th>
                              <th class="text-center">Bobot</th>
                              <th class="text-center">Tipe</th>
                              <th class="text-center">Opsi Penilaian</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $tabel = "SELECT * FROM tbl_kriteria order by id_kriteria";
                            $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                            $no = 1;
                            while ($a = mysqli_fetch_array($query)) {
                            ?>
                              <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $a['nama_kriteria']; ?></td>
                                <td class="text-center"><?php echo $a['bobot_kriteria']; ?></td>
                                <td class="text-center"><?php echo $a['tipe_kriteria']; ?></td>
                                <td class="text-center">
                                  <a href="subkriteria.php?id_kriteria=<?php echo $a['id_kriteria']; ?>"
                                    class="btn btn-primary">LIHAT</a>
                                </td>
                                <td class="text-center">
                                  <a href="kriteria_aksi.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&aksi=ubah"
                                    class="btn btn-success">UBAH</a>
                                  <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                    class="btn btn-danger">HAPUS</a>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                        <div>
                          <p class="mt-2">*Note: Pastikan bobot tidak lebih dari 100!</p>
                        </div>
                        <div class="d-flex justify-content-end mx-3">
                          <a href="nilai.php" class="mt-2 btn btn-success">
                            Selanjutnya
                            <i class="menu-icon mdi mdi-arrow-right-bold"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- TODO -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>