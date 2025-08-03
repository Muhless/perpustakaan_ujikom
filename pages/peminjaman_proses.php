<?php
include '../conn/koneksi.php'; 

if (isset($_GET['proses'])) {
    if ($_GET['proses'] == 'proses_tambah') {
        $id_anggota = mysqli_real_escape_string($koneksi, $_POST['id_anggota']);
        $id_buku = mysqli_real_escape_string($koneksi, $_POST['id_buku']);
        $tanggal_peminjaman = mysqli_real_escape_string($koneksi, $_POST['tanggal_peminjaman']);
        $tanggal_kembali = mysqli_real_escape_string($koneksi, $_POST['tanggal_kembali']);
        $status = 'belum dikembalikan';

        if (empty($id_anggota) || empty($id_buku) || empty($tanggal_peminjaman) || empty($tanggal_kembali)) {
            header("Location: tambah_peminjaman.php?status=error&message=Semua field harus diisi");
            exit;
        }

        $query = "INSERT INTO transaksi_peminjaman (id_anggota, id_buku, tanggal_peminjaman, tanggal_kembali, tanggal_pengembalian, status)
                  VALUES ('$id_anggota', '$id_buku', '$tanggal_peminjaman', '$tanggal_kembali', NULL, '$status')";

        if (mysqli_query($koneksi, $query)) {
            $update_buku = "UPDATE buku SET status = 'dipinjam' WHERE id = '$id_buku'";
            mysqli_query($koneksi, $update_buku);
            
            header("Location: peminjaman.php?status=success&message=Data peminjaman berhasil disimpan");
        } else {
            header("Location: tambah_peminjaman.php?status=error&message=Gagal menyimpan data");
        }

    } elseif ($_GET['proses'] == 'proses_ubah') {
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $id_anggota = mysqli_real_escape_string($koneksi, $_POST['id_anggota']);
        $id_buku = mysqli_real_escape_string($koneksi, $_POST['id_buku']);
        $tanggal_peminjaman = mysqli_real_escape_string($koneksi, $_POST['tanggal_peminjaman']);
        $tanggal_kembali = mysqli_real_escape_string($koneksi, $_POST['tanggal_kembali']);

        $query = "UPDATE transaksi_peminjaman SET 
                  id_anggota='$id_anggota', 
                  id_buku='$id_buku', 
                  tanggal_peminjaman='$tanggal_peminjaman', 
                  tanggal_kembali='$tanggal_kembali' 
                  WHERE id='$id'";

        if (mysqli_query($koneksi, $query)) {
            header("Location: peminjaman.php?status=updated");
        } else {
            header("Location: peminjaman.php?status=error&message=Gagal mengubah data");
        }

    } elseif ($_GET['proses'] == 'proses_hapus') {
        $id = mysqli_real_escape_string($koneksi, $_GET['id']);

        // Ambil data untuk update status buku
        $query_select = "SELECT id_buku FROM transaksi_peminjaman WHERE id='$id'";
        $result = mysqli_query($koneksi, $query_select);
        $data = mysqli_fetch_assoc($result);
        $id_buku = $data['id_buku'];

        $query_delete = "DELETE FROM transaksi_peminjaman WHERE id='$id'";
        $query_update_buku = "UPDATE buku SET status = 'tersedia' WHERE id = '$id_buku'";

        $result1 = mysqli_query($koneksi, $query_delete);
        $result2 = mysqli_query($koneksi, $query_update_buku);

        if ($result1 && $result2) {
            header("Location: peminjaman.php?status=deleted");
        } else {
            header("Location: peminjaman.php?status=error&message=Gagal menghapus data");
        }

    } elseif ($_GET['proses'] == 'kembalikan') {
        $id = mysqli_real_escape_string($koneksi, $_GET['id']);
        $tanggal_pengembalian = date('Y-m-d');

        // Ambil data transaksi untuk ambil id_buku dan tanggal_kembali
        $query_select = "SELECT id_buku, tanggal_kembali FROM transaksi_peminjaman WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query_select);
        $data = mysqli_fetch_assoc($result);

        if ($data) {
            $id_buku = $data['id_buku'];
            $tanggal_kembali = $data['tanggal_kembali'];

            // Hitung keterlambatan
            $datetime1 = new DateTime($tanggal_kembali);
            $datetime2 = new DateTime($tanggal_pengembalian);
            $interval = $datetime1->diff($datetime2);
            $keterlambatan = $interval->invert ? 0 : $interval->days;

            // Update status peminjaman dan tanggal pengembalian
            $query_update = "UPDATE transaksi_peminjaman 
                             SET status = 'dikembalikan', tanggal_pengembalian = '$tanggal_pengembalian', keterlambatan = '$keterlambatan' 
                             WHERE id = '$id'";

            $success = mysqli_query($koneksi, $query_update);

            // Update status buku
            if ($success) {
                $query_buku = "UPDATE buku SET status = 'tersedia' WHERE id = '$id_buku'";
                mysqli_query($koneksi, $query_buku);

                header("Location: peminjaman.php?status=success&message=Buku berhasil dikembalikan");
            } else {
                header("Location: peminjaman.php?status=error&message=Gagal mengembalikan buku");
            }
        } else {
            header("Location: peminjaman.php?status=error&message=Data tidak ditemukan");
        }

    } else {
        header("Location: peminjaman.php?status=invalid_process");
    }
} else {
    header("Location: peminjaman.php?status=invalid_request");
}
?>