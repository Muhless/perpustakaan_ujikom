<?php
$host="localhost";
$user='root';
$pass='';
$db='db_perpustakaan';

$koneksi = mysqli_connect($host, $user, $pass, $db) or die ('tidak terkoneksi ke server');
    if (!$koneksi) {
        die('Gagal terhubung dengan database: ' . mysqli_connect_error());
    }
?>