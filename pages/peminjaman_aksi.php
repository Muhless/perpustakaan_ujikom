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
                            <h2 class="card-title">
                                Tambah Peminjaman Buku
                            </h2>

                            <div class="row">
                                <div class="col-md-8">
                                    <form action="peminjaman_proses.php?proses=proses_tambah" method="post"
                                        id="peminjamanForm">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_anggota">Nama Anggota *</label>
                                                    <select name="id_anggota" id="id_anggota" class="form-control"
                                                        required>
                                                        <option value="" disabled selected>Pilih Anggota</option>
                                                        <?php
                                                        $anggota_query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE status = 'aktif' ORDER BY nama");
                                                        while ($anggota = mysqli_fetch_assoc($anggota_query)) {
                                                            echo "<option value='{$anggota['id']}'>{$anggota['nama']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_buku">Judul Buku *</label>
                                                    <select name="id_buku" id="id_buku" class="form-control" required>
                                                        <option value="" disabled selected>Pilih Buku</option>
                                                        <?php
                                                        $buku_query = mysqli_query($koneksi, "SELECT * FROM buku WHERE status = 'tersedia' ORDER BY judul");
                                                        while ($buku = mysqli_fetch_assoc($buku_query)) {
                                                            echo "<option value='{$buku['id']}'>";
                                                            echo "{$buku['judul']} - {$buku['penulis']}";
                                                            echo "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal_peminjaman">Tanggal Pinjam *</label>
                                                    <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman"
                                                        class="form-control" required
                                                        value="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tanggal_kembali">Tanggal Kembali *</label>
                                                    <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                                                        class="form-control" required
                                                        value="<?php echo date('Y-m-d', strtotime('+14 days')); ?>">
                                                    <small class="form-text text-muted">Maksimal 14 hari dari tanggal
                                                        pinjam</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <a href="peminjaman.php" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left"></i> KEMBALI
                                            </a>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-save"></i> SIMPAN
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end CONTENT -->

<script>
// Validasi tanggal
document.getElementById('tanggal_peminjaman').addEventListener('change', function() {
    const tanggalPinjam = new Date(this.value);
    const tanggalKembali = document.getElementById('tanggal_kembali');

    // Set minimum tanggal kembali = tanggal pinjam + 1 hari
    const minKembali = new Date(tanggalPinjam);
    minKembali.setDate(minKembali.getDate() + 1);

    // Set maximum tanggal kembali = tanggal pinjam + 14 hari
    const maxKembali = new Date(tanggalPinjam);
    maxKembali.setDate(maxKembali.getDate() + 14);

    tanggalKembali.min = minKembali.toISOString().split('T')[0];
    tanggalKembali.max = maxKembali.toISOString().split('T')[0];

    // Auto set tanggal kembali ke 14 hari dari tanggal pinjam
    if (!tanggalKembali.value || new Date(tanggalKembali.value) <= tanggalPinjam) {
        tanggalKembali.value = maxKembali.toISOString().split('T')[0];
    }
});

// Validasi form
document.getElementById('peminjamanForm').addEventListener('submit', function(e) {
    const tanggalPinjam = new Date(document.getElementById('tanggal_peminjaman').value);
    const tanggalKembali = new Date(document.getElementById('tanggal_kembali').value);

    if (tanggalKembali <= tanggalPinjam) {
        e.preventDefault();
        alert('Tanggal kembali harus setelah tanggal pinjam!');
        return false;
    }

    const diffTime = Math.abs(tanggalKembali - tanggalPinjam);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays > 14) {
        e.preventDefault();
        alert('Durasi peminjaman maksimal 14 hari!');
        return false;
    }
});
</script>