<?php
$db = mysqli_connect("localhost", "root", "", "pendaftaran_siswa");

if (!$db) {
    die("Gagal terhubung ke database: " . mysqli_connect_error());
}
?>
