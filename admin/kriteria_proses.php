<?php
include '../conn/koneksi.php'; // Pastikan koneksi database ada di dalam file ini

if (isset($_GET['proses'])) {
    if ($_GET['proses'] == 'proses_tambah') {
        $nama_kriteria = mysqli_real_escape_string($koneksi, $_POST['nama_kriteria']);
        $bobot_kriteria = mysqli_real_escape_string($koneksi, $_POST['bobot_kriteria']);
        $tipe_kriteria = mysqli_real_escape_string($koneksi, $_POST['tipe_kriteria']);

        $query = "INSERT INTO tbl_kriteria (nama_kriteria, bobot_kriteria, tipe_kriteria) 
                  VALUES ('$nama_kriteria', '$bobot_kriteria', '$tipe_kriteria')";

        if (mysqli_query($koneksi, $query)) {
            header("Location: kriteria.php?status=success");
        } else {
            die("Error: " . mysqli_error($koneksi));
        }
    } elseif ($_GET['proses'] == 'proses_ubah') {
        $id_kriteria = mysqli_real_escape_string($koneksi, $_POST['id_kriteria']);
        $nama_kriteria = mysqli_real_escape_string($koneksi, $_POST['nama_kriteria']);
        $bobot_kriteria = mysqli_real_escape_string($koneksi, $_POST['bobot_kriteria']);
        $tipe_kriteria = mysqli_real_escape_string($koneksi, $_POST['tipe_kriteria']);

        $query = "UPDATE tbl_kriteria SET 
                  nama_kriteria='$nama_kriteria', 
                  bobot_kriteria='$bobot_kriteria', 
                  tipe_kriteria='$tipe_kriteria' 
                  WHERE id_kriteria='$id_kriteria'";

        if (mysqli_query($koneksi, $query)) {
            header("Location: kriteria.php?status=updated");
        } else {
            die("Error: " . mysqli_error($koneksi));
        }
    } elseif ($_GET['proses'] == 'proses_hapus') {
        $id_kriteria = mysqli_real_escape_string($koneksi, $_GET['id_kriteria']);

        $query1 = "DELETE FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'";
        $query2 = "DELETE FROM tbl_subkriteria WHERE id_subkriteria='$id_kriteria'";

        $result1 = mysqli_query($koneksi, $query1);
        $result2 = mysqli_query($koneksi, $query2);

        if ($result1 && $result2) {
            header("Location: kriteria.php?status=deleted");
        } else {
            die("Error: " . mysqli_error($koneksi));
        }
    } else {
        header("Location: kriteria.php?status=invalid_process");
    }
} else {
    header("Location: kriteria.php?status=invalid_request");
}
?>
