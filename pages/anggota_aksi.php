<?php
include 'header.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'tambah') { ?>
<div class="container mt-5">
    <div class="row">
        <ol class="breadcrumb">
            <h4>Tambah Data Anggota</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootsrap-table">
            <form action="anggota_proses.php?proses=proses_tambah" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="nama anggota">
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" class="form-control" placeholder="0">
                </div>
                <div class="form-group">
                    <label for="">Fakultas</label>
                    <select name="fakultas" class="form-control">
                        <option disabled selected>Pilih Fakultas</option>
                        <option>Teknik</option>
                        <option>Ekonomi</option>
                        <option>Ilmu Komputer</option>
                        <option>Keguruan dan Ilmu Pendidikan</option>
                        <option>Hukum</option>
                        <option>Ilmu Sosial dan Ilmu Politik</option>
                        <option>Pertanian</option>
                        <option>Kesehatan</option>
                        <option>Kedokteran</option>
                        <option>Psikologi</option>
                        <option>Sastra</option>
                        <option>Matematika dan Ilmu Pengetahuan Alam</option>
                        <option>Agama Islam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Program Studi</label>
                    <select name="program_studi" class="form-control" required>
                        <option disabled selected>Pilih Program Studi</option>

                        <!-- Teknik -->
                        <option>Teknik Informatika</option>
                        <option>Teknik Sipil</option>
                        <option>Teknik Mesin</option>
                        <option>Teknik Elektro</option>
                        <option>Teknik Industri</option>

                        <!-- Ekonomi -->
                        <option>Manajemen</option>
                        <option>Akuntansi</option>
                        <option>Ekonomi Pembangunan</option>

                        <!-- Ilmu Komputer -->
                        <option>Sistem Informasi</option>
                        <option>Ilmu Komputer</option>

                        <!-- Keguruan dan Ilmu Pendidikan -->
                        <option>Pendidikan Bahasa Indonesia</option>
                        <option>Pendidikan Bahasa Inggris</option>
                        <option>Pendidikan Matematika</option>
                        <option>Pendidikan Guru SD</option>

                        <!-- Hukum -->
                        <option>Ilmu Hukum</option>

                        <!-- Pertanian -->
                        <option>Agroteknologi</option>
                        <option>Agribisnis</option>

                        <!-- Kedokteran -->
                        <option>Pendidikan Dokter</option>

                        <!-- Psikologi -->
                        <option>Psikologi</option>

                        <!-- Sastra -->
                        <option>Sastra Indonesia</option>
                        <option>Sastra Inggris</option>

                        <!-- Agama -->
                        <option>Pendidikan Agama Islam</option>
                        <option>Perbankan Syariah</option>

                        <!-- Desain -->
                        <option>Desain Komunikasi Visual</option>
                        <option>Seni Rupa</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <a href="anggota.php" class="btn btn-primary">KEMBALI</a>
                    <input type="submit" class="btn btn-success" value="SIMPAN">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    } elseif ($_GET['aksi'] == 'ubah') { ?>
<div class="container">
    <div class="row">
        <ol class="breadcrumb">
            <h4>KRITERIA/UBAH DATA</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootsrap-table">
            <?php
                    $tabel = "SELECT * FROM tbl_kriteria WHERE id_kriteria=$_GET[id_kriteria]";
        $query = mysqli_query($koneksi, $tabel) or exit(mysqli_error($koneksi));
        while ($a = mysqli_fetch_array($query)) {
            ?>
            <form action="kriteria_proses.php?proses=proses_ubah" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_kriteria" value="<?php echo $a['id_kriteria']; ?>">

                <div class="form-group">
                    <label for="">Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" class="form-control" placeholder="nama kriteria"
                        value="<?php echo $a['nama_kriteria']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Bobot Kriteria</label>
                    <input type="number" name="bobot_kriteria" class="form-control" placeholder="0"
                        value="<?php echo $a['bobot_kriteria']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Tipe Kriteria</label>
                    <select name="tipe_kriteria" class="form-control">
                        <option selected><?php echo $a['tipe_kriteria']; ?></option>
                        <option>Benefit</option>
                        <option>Cost</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <a href="kriteria.php" class="btn btn-primary">KEMBALI</a>
                    <input type="submit" class="btn btn-success" value="UBAH">
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php }
    } ?>