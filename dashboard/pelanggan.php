<?php
include "../admin/header.php";
?>

<div class="container-fluid page-body-wrapper">
 <!-- sidebar -->
 <?php include "../sidebar.php"; ?>
  <!-- end sidebar -->

  <!-- CONTENT -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Pelanggan</h2>
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
                              <th class="text-center">Keterangan</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">1</td>
                              <td>Ibu Listi</td>
                              <td>Cisoka, Balaraja</td>
                              <td class="text-center">08871165551</td>
                              <td>Pesanan 20kg beras</td>
                              <td class="text-center">
                                <a href="kriteria_aksi.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&aksi=ubah"
                                  class="btn btn-success">UBAH</a>
                                <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                  class="btn btn-danger">HAPUS</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">2</td>
                              <td>Bapak Amirudin</td>
                              <td>Kp. Kepuh, Balaraja</td>
                              <td class="text-center">081224343531</td>
                              <td>Sisa yang belum dibayar, Rp200.000 </td>
                              <td class="text-center">
                                <a href="kriteria_aksi.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&aksi=ubah"
                                  class="btn btn-success">UBAH</a>
                                <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                  class="btn btn-danger">HAPUS</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">3</td>
                              <td>Bapak Komar</td>
                              <td>Cangkudu, Balaraja</td>
                              <td class="text-center">088968782132</td>
                              <td>Pesan dedak halus 8kg</td>
                              <td class="text-center">
                                <a href="kriteria_aksi.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&aksi=ubah"
                                  class="btn btn-success">UBAH</a>
                                <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                  class="btn btn-danger">HAPUS</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">4</td>
                              <td>Bapak Saef</td>
                              <td>Pasir Bolang, Tigaraksa</td>
                              <td class="text-center">089668572461</td>
                              <td>Hutang Rp400.000</td>
                              <td class="text-center">
                                <a href="kriteria_aksi.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&aksi=ubah"
                                  class="btn btn-success">UBAH</a>
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