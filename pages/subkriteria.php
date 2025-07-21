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
                            <h1 class="card-title">Opsi Penilaian</h1>
                            <div class="row">
                                <!-- TODO -->
                                <div class="container">
                                    <div class="row">
                                        <?php
                                        $data = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$_GET[id_kriteria]'");
$a = mysqli_fetch_array($data);
?>
                                    </div>
                                    <div class="panel panel-container">
                                        <div class="bootstrap-table">
                                            <a href="kriteria.php" class="btn btn-danger mr-5">
                                                Kembali
                                            </a>
                                            <a href="subkriteria_aksi.php?aksi=tambah&id_kriteria=<?php echo $_GET['id_kriteria']; ?>" class="btn btn-primary">
                                                TAMBAH DATA
                                            </a>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Opsi</th>
                                                            <th class="text-center">Nilai</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                $tabel = "SELECT * FROM tbl_kriteria a, tbl_subkriteria b 
                        WHERE a.id_kriteria=b.id_kriteria AND b.id_kriteria='$_GET[id_kriteria]' 
                        order by b.id_subkriteria";
$query = mysqli_query($koneksi, $tabel) or exit(mysqli_error($koneksi));
$no = 1;
while ($a = mysqli_fetch_array($query)) {
    ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $no++; ?></td>
                                                                <td class="text-center"><?php echo $a['nama_subkriteria']; ?></td>
                                                                <td class="text-center"><?php echo $a['nilai_subkriteria']; ?></td>

                                                                <td class="text-center">
                                                                    <a href="subkriteria_aksi.php?id_kriteria=
                                <?php echo $a['id_kriteria']; ?>&id_subkriteria=<?php echo $a['id_subkriteria']; ?>&aksi=ubah"
                                                                        class="btn btn-success">UBAH</a>
                                                                    <a href="subkriteria_proses.php?id_kriteria=
                                 <?php echo $a['id_kriteria']; ?>&id_subkriteria=<?php echo $a['id_subkriteria']; ?>&proses=proses_hapus"
                                                                        class="btn btn-danger">HAPUS</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

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
</div>
</div>
<!-- FIXME: DROPDOWN -->