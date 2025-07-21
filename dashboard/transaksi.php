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
              <h2 class="card-title">Transaksi</h2>
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
                              <th class="text-center">Transaksi</th>
                              <th class="text-center">Tanggal</th>
                              <th class="text-center">Jumlah</th>
                              <th class="text-center">Harga</th>
                              <th class="text-center">Keterangan</th>
                              <th class="text-center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">1</td>
                              <td>Penjualan beras</td>
                              <td class="text-center">20 November 2024</td>
                              <td class="text-center">20kg</td>
                              <td class="text-center">Rp280.000</td>
                              <td class="text-center">Lunas</td>
                              <td class="text-center">
                                <a href="kriteria_aksi.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&aksi=ubah"
                                  class="btn btn-success">UBAH</a>
                                <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                  class="btn btn-danger">HAPUS</a>
                              </td>
                            </tr>
                            <tr>
                              <td class="text-center">2</td>
                              <td>Penjualan beras</td>
                              <td class="text-center">26 November 2024</td>
                              <td class="text-center">5kg</td>
                              <td class="text-center">Rp70.000</td>
                              <td class="text-center">Lunas</td>
                              <td class="text-center">
                                  <a href="kriteria_aksi.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&aksi=ubah"
                                    class="btn btn-success">UBAH</a>
                                  <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                    class="btn btn-danger">HAPUS</a>
                                </td>
                            </tr>
                            <tr>
                              <td class="text-center">3</td>
                              <td>Pembelian beras</td>
                              <td class="text-center">3 Desember 2024</td>
                              <td class="text-center">8kg</td>
                              <td class="text-center">Rp112.000</td>
                              <td class="text-center">Lunas</td>
                              <td class="text-center">
                                  <a href="kriteria_aksi.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&aksi=ubah"
                                    class="btn btn-success">UBAH</a>
                                  <a href="kriteria_proses.php?id_kriteria=<?php echo $a['id_kriteria']; ?>&proses=proses_hapus"
                                    class="btn btn-danger">HAPUS</a>
                                </td>
                            </tr>
                            <tr>
                              <td class="text-center">4</td>
                              <td>Pembelian beras</td>
                              <td class="text-center">5 Desember 2024</td>
                              <td class="text-center">30kg</td>
                              <td class="text-center">Rp420.000</td>
                              <td class="text-center">Hutang</td>
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