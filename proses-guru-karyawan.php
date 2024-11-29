<?php
include("config.php");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];

    $foto = $_FILES['foto'];
    $foto_name = $foto['name'];
    $foto_tmp = $foto['tmp_name'];
    $foto_path = __DIR__ . '/uploads/' . $foto_name;

    // Buat folder uploads jika belum ada
    if (!is_dir(__DIR__ . '/uploads')) {
        mkdir(__DIR__ . '/uploads', 0777, true);
    }

    // Pindahkan file foto ke folder uploads
    if (move_uploaded_file($foto_tmp, $foto_path)) {
        $sql = "INSERT INTO guru_karyawan (nama, jenis, jabatan, gaji, foto) 
                VALUES ('$nama', '$jenis', '$jabatan', '$gaji', '$foto_name')";
    } else {
        $sql = "INSERT INTO guru_karyawan (nama, jenis, jabatan, gaji) 
                VALUES ('$nama', '$jenis', '$jabatan', '$gaji')";
    }

    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: sukses-daftar.php');
    } else {
        die("Gagal menyimpan data: " . mysqli_error($db));
    }
}
?>
