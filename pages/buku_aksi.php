<?php
include 'header.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'tambah') { ?>
<div class="container mt-5">
    <div class="row">
        <ol class="breadcrumb">
            <h4>BUKU/TAMBAH DATA</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootsrap-table">
            <form action="buku_proses.php?proses=proses_tambah" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan judul buku" required>
                </div>
                <div class="form-group">
                    <label for="">Penulis</label>
                    <input type="text" name="penulis" class="form-control" placeholder="Masukkan nama penulis" required>
                </div>
                <div class="form-group">
                    <label for="">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" placeholder="Masukkan nama penerbit"
                        required>
                </div>
                <div class="form-group">
                    <label for="">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" placeholder="Contoh: 2023" min="1900"
                        max="<?php echo date('Y'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Genre</label>
                    <select name="genre" class="form-control" required>
                        <option disabled selected>Pilih Genre</option>
                        <option>Fiksi</option>
                        <option>Non-Fiksi</option>
                        <option>Romance</option>
                        <option>Mystery</option>
                        <option>Thriller</option>
                        <option>Fantasy</option>
                        <option>Science Fiction</option>
                        <option>Horror</option>
                        <option>Biography</option>
                        <option>History</option>
                        <option>Self-Help</option>
                        <option>Business</option>
                        <option>Education</option>
                        <option>Health</option>
                        <option>Religion</option>
                        <option>Philosophy</option>
                        <option>Poetry</option>
                        <option>Drama</option>
                        <option>Comedy</option>
                        <option>Adventure</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <a href="buku.php" class="btn btn-primary">KEMBALI</a>
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
            <h4>BUKU/UBAH DATA</h4>
        </ol>
    </div>
    <div class="panel panel-container">
        <div class="bootsrap-table">
            <?php
                    $tabel = "SELECT * FROM tbl_buku WHERE id_buku=$_GET[id_buku]";
        $query = mysqli_query($koneksi, $tabel) or exit(mysqli_error($koneksi));
        while ($a = mysqli_fetch_array($query)) {
            ?>
            <form action="buku_proses.php?proses=proses_ubah" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_buku" value="<?php echo $a['id_buku']; ?>">

                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan judul buku"
                        value="<?php echo $a['judul']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Penulis</label>
                    <input type="text" name="penulis" class="form-control" placeholder="Masukkan nama penulis"
                        value="<?php echo $a['penulis']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" placeholder="Masukkan nama penerbit"
                        value="<?php echo $a['penerbit']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" placeholder="Contoh: 2023" min="1900"
                        max="<?php echo date('Y'); ?>" value="<?php echo date('Y', strtotime($a['tahun_terbit'])); ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="">Genre</label>
                    <select name="genre" class="form-control" required>
                        <option selected><?php echo $a['genre']; ?></option>
                        <option>Fiksi</option>
                        <option>Non-Fiksi</option>
                        <option>Romance</option>
                        <option>Mystery</option>
                        <option>Thriller</option>
                        <option>Fantasy</option>
                        <option>Science Fiction</option>
                        <option>Horror</option>
                        <option>Biography</option>
                        <option>History</option>
                        <option>Self-Help</option>
                        <option>Business</option>
                        <option>Education</option>
                        <option>Health</option>
                        <option>Religion</option>
                        <option>Philosophy</option>
                        <option>Poetry</option>
                        <option>Drama</option>
                        <option>Comedy</option>
                        <option>Adventure</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <a href="buku.php" class="btn btn-primary">KEMBALI</a>
                    <input type="submit" class="btn btn-success" value="UBAH">
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php }
    } ?>