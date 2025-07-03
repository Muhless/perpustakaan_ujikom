<?php
include 'header.php';
?>

<!-- TODO: DROPDOWN -->
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="mdi mdi-grid-large menu-icon"></i>
                    <span class="menu-title">Halaman Awal</span>
                </a>
            </li>
            <!-- FIXME -->
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
                                                        $query = mysqli_query($koneksi, $tabel) or die(mysqli_error($koneksi));
                                                        $no = 1;
                                                        while ($a = mysqli_fetch_array($query)) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $no++ ?></td>
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