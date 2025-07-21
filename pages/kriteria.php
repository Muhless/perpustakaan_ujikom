<?php
include 'header.php';
?>

<!-- TODO: DROPDOWN -->
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <?php
$base_path = '..';
include '../sidebar.php';
?>
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
                          $tabel = 'SELECT * FROM tbl_kriteria order by id_kriteria';
$query = mysqli_query($koneksi, $tabel) or exit(mysqli_error($koneksi));
$no = 1;
while ($a = mysqli_fetch_array($query)) {
    ?>
                              <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
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