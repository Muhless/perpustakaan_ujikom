<?php
include 'header.php';
?>

<div class="container-fluid page-body-wrapper">
    <?php
$base_path = '..';
include '../sidebar.php';
?>

    <!-- CONTENT -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Buku</h2>
                            <div class="row">
                                <!-- TODO -->
                                <div class="container">
                                    <div class="panel panel-container">
                                        <div class="bootstrap-table">
                                            <a href="buku_aksi.php?aksi=tambah" class="btn btn-primary">TAMBAH
                                                DATA</a>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Judul</th>
                                                            <th class="text-center">Penulis</th>
                                                            <th class="text-center">Penerbit</th>
                                                            <th class="text-center">Tahun Terbit</th>
                                                            <th class="text-center">Genre</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM buku"); 
while ($data = mysqli_fetch_assoc($query)) {
?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                            <td><?php echo $data['judul']; ?></td>
                                                            <td class="text-center"><?php echo $data['penulis']; ?></td>
                                                            <td class="text-center"><?php echo $data['penerbit']; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $data['tahun_terbit']; ?></td>
                                                            <td class="text-center"><?php echo $data['genre']; ?>
                                                            <td class="text-center"><?php echo $data['status']; ?>

                                                            <td class="text-center">
                                                                <a class="btn btn-success">UBAH</a>
                                                                <a href="buku_proses.php?id=<?php echo $data['id']; ?>&proses=proses_hapus"
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
    <!-- end CONTENT -->