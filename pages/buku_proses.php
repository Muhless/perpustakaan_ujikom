<?php
include '../conn/koneksi.php'; 

if (isset($_GET['proses'])) {
    if ($_GET['proses'] == 'proses_tambah') {
        // Validasi input
        if (empty($_POST['judul']) || empty($_POST['penulis']) || empty($_POST['penerbit']) || 
            empty($_POST['tahun_terbit']) || empty($_POST['genre'])) {
            die("Error: Semua field harus diisi");
        }

        // Sanitasi input
        $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
        $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
        $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
        $genre = mysqli_real_escape_string($koneksi, $_POST['genre']);
        
        // Proses tahun terbit
        $tahun_terbit = (int)$_POST['tahun_terbit'];
        
        // Validasi tahun
        if ($tahun_terbit < 1900 || $tahun_terbit > date('Y')) {
            die("Error: Tahun terbit tidak valid (1900 - " . date('Y') . ")");
        }
        
        // Konversi tahun ke format DATE dengan default 1 Januari
        $tahun_terbit_date = $tahun_terbit . '-01-01';
        $status = 'tersedia';

        // Gunakan prepared statement untuk keamanan
        $stmt = mysqli_prepare($koneksi, "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, status, genre) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssss", $judul, $penulis, $penerbit, $tahun_terbit_date, $status, $genre);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: buku.php?status=success&message=Data berhasil ditambahkan");
        } else {
            mysqli_stmt_close($stmt);
            die("Error: " . mysqli_error($koneksi));
        }

    } elseif ($_GET['proses'] == 'proses_ubah') {
        if (empty($_POST['id_buku']) || empty($_POST['judul']) || empty($_POST['penulis']) || 
            empty($_POST['penerbit']) || empty($_POST['tahun_terbit']) || empty($_POST['genre'])) {
            die("Error: Semua field harus diisi");
        }

        $id_buku = (int)$_POST['id_buku'];
        $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
        $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
        $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);
        $genre = mysqli_real_escape_string($koneksi, $_POST['genre']);
        
        $tahun_terbit = (int)$_POST['tahun_terbit'];
        
        if ($tahun_terbit < 1900 || $tahun_terbit > date('Y')) {
            die("Error: Tahun terbit tidak valid (1900 - " . date('Y') . ")");
        }
        
        $tahun_terbit_date = $tahun_terbit . '-01-01';
        
        $status = isset($_POST['status']) ? mysqli_real_escape_string($koneksi, $_POST['status']) : 'tersedia';

        $stmt = mysqli_prepare($koneksi, "UPDATE buku SET judul=?, penulis=?, penerbit=?, tahun_terbit=?, status=?, genre=? WHERE id_buku=?");
        mysqli_stmt_bind_param($stmt, "ssssssi", $judul, $penulis, $penerbit, $tahun_terbit_date, $status, $genre, $id_buku);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: buku.php?status=updated&message=Data berhasil diubah");
        } else {
            mysqli_stmt_close($stmt);
            die("Error: " . mysqli_error($koneksi));
        }

    } elseif ($_GET['proses'] == 'proses_hapus') {
        if (empty($_GET['id_buku'])) {
            die("Error: ID Buku tidak valid");
        }

        $id_buku = (int)$_GET['id_buku'];

        $check_stmt = mysqli_prepare($koneksi, "SELECT COUNT(*) as count FROM buku WHERE id_buku = ?");
        mysqli_stmt_bind_param($check_stmt, "i", $id_buku);
        mysqli_stmt_execute($check_stmt);
        $check_result = mysqli_stmt_get_result($check_stmt);
        $check_data = mysqli_fetch_assoc($check_result);
        mysqli_stmt_close($check_stmt);

        if ($check_data['count'] == 0) {
            header("Location: buku.php?status=error&message=Data tidak ditemukan");
            exit();
        }

        $stmt = mysqli_prepare($koneksi, "DELETE FROM buku WHERE id_buku = ?");
        mysqli_stmt_bind_param($stmt, "i", $id_buku);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: buku.php?status=deleted&message=Data berhasil dihapus");
        } else {
            mysqli_stmt_close($stmt);
            die("Error: " . mysqli_error($koneksi));
        }

    } else {
        header("Location: buku.php?status=invalid_process&message=Proses tidak valid");
    }
} else {
    header("Location: buku.php?status=invalid_request&message=Request tidak valid");
}
?>