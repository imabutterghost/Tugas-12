<?php
include("config.php");

// Cek apakah tombol daftar diklik
if (isset($_POST['daftar'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];

    // Proses upload foto
    $foto = $_FILES['foto'];
    $foto_name = $foto['name'];
    $foto_tmp = $foto['tmp_name'];
    $foto_path = 'uploads/' . $foto_name;

    // Upload file ke folder 'uploads'
    if (move_uploaded_file($foto_tmp, $foto_path)) {
        // Simpan data ke database
        $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) 
                VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal', '$foto_name')";
        $query = mysqli_query($db, $sql);

        // Cek apakah data berhasil disimpan
        if ($query) {
            header('Location: sukses-daftar.php');
        } else {
            echo "Pendaftaran gagal!";
        }
    } else {
        echo "Gagal upload foto.";
    }
}
?>
