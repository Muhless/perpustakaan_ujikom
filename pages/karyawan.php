<?php
include 'header.php';
?>

<div class="container-fluid page-body-wrapper">
   <!-- sidebar -->
    
   <?php
$base_path = '..';
include '../sidebar.php'; ?>
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