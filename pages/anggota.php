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
                            <h2 class="card-title">Anggota</h2>
                            <div class="row">
                                <!-- TODO -->
                                <div class="container">
                                    <div class="panel panel-container">
                                        <div class="bootstrap-table">
                                            <a href="anggota_aksi.php?aksi=tambah" class="btn btn-primary">TAMBAH
                                                DATA</a>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">NIM</th>
                                                            <th class="text-center">Fakultas</th>
                                                            <th class="text-center">Program Studi</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM anggota"); 
while ($data = mysqli_fetch_assoc($query)) {
?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                            <td><?php echo $data['nama']; ?></td>
                                                            <td class="text-center"><?php echo $data['nim']; ?></td>
                                                            <td class="text-center"><?php echo $data['fakultas']; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $data['program_studi']; ?></td>
                                                            <td class="text-center"><?php echo $data['status']; ?></td>

                                                            <td class="text-center">
                                                                <a class="btn btn-success">UBAH</a>
                                                                <a href="anggota_proses.php?id_anggota=<?php echo $data['id']; ?>&proses=proses_hapus"
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