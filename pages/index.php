<?php
include "header.php";

$q_anggota = mysqli_query($koneksi, "SELECT COUNT(*) as total_anggota FROM anggota");
$data_anggota = mysqli_fetch_assoc($q_anggota);

// Hitung total buku
$q_buku = mysqli_query($koneksi, "SELECT COUNT(*) as total_buku FROM buku");
$data_buku = mysqli_fetch_assoc($q_buku);

// Hitung total transaksi peminjaman
$q_peminjaman = mysqli_query($koneksi, "SELECT COUNT(*) as total_peminjaman FROM transaksi_peminjaman");
$data_peminjaman = mysqli_fetch_assoc($q_peminjaman);
?>

<div class="container-fluid page-body-wrapper">

    <!-- sidebar -->
    <?php
$base_path = ".."; 
include "../sidebar.php";
?>
    <!-- end sidebar -->

    <!-- CONTENT -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="row flex-grow">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded table-darkBGImg">
                            <div class="card-body">
                                <div class="col-lg-8">
                                    <h3 class="text-white upgrade-info mb-0"> Selamat Datang, <span
                                            class="fw-bold">Petugas</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="col-lg-12 d-flex flex-column">
                    <div class="row flex-grow">

                        <!-- pelanggan -->
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="card card-rounded bg-danger text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Anggota</h5>
                                        <p class="card-text fs-4 fw-bold"><?php echo $data_anggota['total_anggota']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card card-rounded bg-warning text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Buku</h5>
                                        <p class="card-text fs-4 fw-bold"><?php echo $data_buku['total_buku']; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card card-rounded bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Peminjaman</h5>
                                        <p class="card-text fs-4 fw-bold">
                                            <?php echo $data_peminjaman['total_peminjaman']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end pegawai -->
                    </div>
                    <!--  -->
                </div>
            </div>
            <!--  -->

        </div>