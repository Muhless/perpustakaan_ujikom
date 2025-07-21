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
                        <div class="col d-flex justify-content-between align-items-center mb-3">
                             <h2 class="card-title mb-0">Hasil Analisa Metode SAW</h2>
                                 <a href="../export_pdf.php" class="btn btn-success">Export ke PDF</a>
                            </div>
                            <div class="row">
                                <!-- TODO -->
                                <div class="container">
                                    <div class="panel panel-container">
                                        <div class="bootstrap-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Nama Alternatif</th>
                                                            <th class="text-center">Nilai SAW</th>
                                                            <th class="text-center">Ranking</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $tabel = 'SELECT * FROM tbl_alternatif order by ranking';
$query = mysqli_query($koneksi, $tabel) or exit(mysqli_error($koneksi));
$no = 1;
while ($a = mysqli_fetch_array($query)) {
    ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $no++; ?></td>
                                                                <td><?php echo $a['nama_alternatif']; ?></td>
                                                                <td class="text-center"><?php echo number_format($a['nilai_saw'], 2); ?></td>
                                                                <td class="text-center"><?php echo $a['ranking']; ?></td>
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