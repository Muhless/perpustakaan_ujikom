<?php
include "../admin/header.php";
?>

<div class="container-fluid page-body-wrapper">
  <!-- sidebar -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="../admin/index.php">
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
        <a class="nav-link" href="../admin/alternatif.php">
          <i class="menu-icon mdi mdi-format-list-bulleted"></i>
          <span class="menu-title">Alternatif</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../admin/kriteria.php">
          <i class="menu-icon mdi mdi-playlist-plus"></i>
          <span class="menu-title">Kriteria</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../admin/nilai.php">
          <i class="menu-icon mdi mdi-check-all"></i>
          <span class="menu-title">Nilai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../admin/metode.php">
          <i class="menu-icon mdi mdi-chart-bar"></i>
          <span class="menu-title">Metode</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../admin/hasil.php">
          <i class="menu-icon mdi mdi-crown"></i>
          <span class="menu-title">Hasil</span>
        </a>
      </li>
      <li class="nav-item mt-5">
        <a class="nav-link" href="../admin/logout.php">
          <i class="menu-icon mdi mdi-logout-variant"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>
      <!-- FIXME -->

    </ul>
  </nav>
  <!-- end sidebar -->

  <!-- CONTENT -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Karyawan</h2>
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
                              <th class="text-center">Nama</th>
                              <th class="text-center">Alamat</th>
                              <th class="text-center">No Telepon</th>
                              <th class="text-center">Absensi</th>
                              <th class="text-center">Gaji</th>
                              <th class="text-center">Keterangan</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">1</td>
                              <td>Sarmada</td>
                              <td class="text-center">Kp. Cangkudu, Kec. Balaraja</td>
                              <td class="text-center">08871165551</td>
                              <td class="text-center">
                                <a class="btn btn-info">Cek Absensi</a>
                              </td>
                              <td class="text-center">Rp3.500.000</td>
                              <td class="text-center">Aktif</td>
                              <td class="text-center">
                                <a class="btn btn-success">UBAH</a>
                                <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                  class="btn btn-danger">HAPUS</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">2</td>
                              <td>Ahmad Letto</td>
                              <td class="text-center">Kp. Caringin, Kec. Cisoka</td>
                              <td class="text-center">081234128967</td>
                              <td class="text-center"><a class="btn btn-info">Cek Absensi</a></td>
                              <td class="text-center">Rp3.500.000</td>
                              <td class="text-center">Aktif</td>
                              <td class="text-center">
                                <a class="btn btn-success">UBAH</a>
                                <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                  class="btn btn-danger">HAPUS</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">3</td>
                              <td>Pian Andrian</td>
                              <td class="text-center">Telaga Bestari, blok A4, Kec. Balaraja</td>
                              <td class="text-center">088136784562</td>
                              <td class="text-center"><a class="btn btn-info">Cek Absensi</a></td>
                              <td class="text-center">Rp3.500.000</td>
                              <td class="text-center">Tidak Aktif</td>
                              <td class="text-center">
                                <a class="btn btn-success">UBAH</a>
                                <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                  class="btn btn-danger">HAPUS</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">4</td>
                              <td>Lintang Ramadhan</td>
                              <td class="text-center">Jl. Pasir Bolang, RT.06 RW.01</td>
                              <td class="text-center">085678564376</td>
                              <td class="text-center"><a class="btn btn-info">Cek Absensi</a></td>
                              <td class="text-center">Rp3.500.000</td>
                              <td class="text-center">Tidak Aktif</td>
                              <td class="text-center">
                                <a class="btn btn-success">UBAH</a>
                                <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                  class="btn btn-danger">HAPUS</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
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
  <!-- end CONTENT -->