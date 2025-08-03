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
                            <h2 class="card-title">Pengembalian</h2>
                            <div class="row">
                                <!-- TODO -->
                                <div class="container">
                                    <div class="panel panel-container">
                                        <div class="bootstrap-table">
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Anggota</th>
                                                            <th class="text-center">Buku</th>
                                                            <th class="text-center">Tanggal Peminjaman</th>
                                                            <th class="text-center">Tanggal Kembali</th>
                                                            <th class="text-center">Tanggal Pengembalian</th>
                                                            <th class="text-center">Keterlambatan</th>
                                                            <th class="text-center">Denda</th>
                                                            <th class="text-center">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
$no = 1;
$query = mysqli_query($koneksi, "
    SELECT t.*, a.nama AS nama_anggota, b.judul 
    FROM transaksi_peminjaman t
    JOIN anggota a ON t.id_anggota = a.id
    JOIN buku b ON t.id_buku = b.id
    WHERE t.status = 'dikembalikan'
    ORDER BY t.tanggal_peminjaman DESC
");



while($data = mysqli_fetch_array($query)) {
?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no++; ?></td>
                                                            <td><?php echo $data['nama_anggota']; ?></td>
                                                            <td><?php echo $data['judul']; ?></td>
                                                            <td class="text-center">
                                                                <?php echo date('d-m-Y', strtotime($data['tanggal_peminjaman'])); ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo date('d-m-Y', strtotime($data['tanggal_kembali'])); ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo date('d-m-Y', strtotime($data['tanggal_pengembalian'])); ?>
                                                            </td>
                                                            <td><?php echo $data['keterlambatan']; ?> hari</td>
                                                            <td><?php echo $data['denda']; ?></td>


                                                            <td class="text-center">
                                                                <?php 
                                                                if($data['status'] == 'dikembalikan') {
                                                                    echo '<span class="badge badge-success">Dikembalikan</span>';
                                                                } elseif($data['status'] == 'belum dikembalikan') {
                                                                    $today = date('Y-m-d');
                                                                    $tanggal_kembali = $data['tanggal_kembali'];
                                                                    
                                                                    if($tanggal_kembali < $today) {
                                                                        echo '<span class="badge badge-danger">Terlambat</span>';
                                                                    } else {
                                                                        echo '<span class="badge badge-warning">Dipinjam</span>';
                                                                    }
                                                                } else {
                                                                    echo '<span class="badge badge-secondary">' . $data['status'] . '</span>';
                                                                }
                                                                ?>
                                                            </td>

                                                        </tr>
                                                        <?php 
} 

if(mysqli_num_rows($query) == 0) {
?>
                                                        <tr>
                                                            <td colspan=" 8" class="text-center">Tidak ada data
                                                                peminjaman
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