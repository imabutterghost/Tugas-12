<?php
include("config.php");

$query = "SELECT * FROM guru_karyawan";
$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Guru dan Karyawan</title>
</head>
<body>
    <h3>Daftar Guru dan Karyawan</h3>
    <a href="form-guru-karyawan.php">[+] Tambah Baru</a>
    <a href="cetak-guru-karyawan.php" target="_blank">Cetak PDF</a>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Jabatan</th>
                <th>Gaji</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['jenis']; ?></td>
                    <td><?= $row['jabatan']; ?></td>
                    <td><?= $row['gaji']; ?></td>
                    <td>
                        <?php if ($row['foto']): ?>
                            <img src="uploads/<?= $row['foto']; ?>" width="100">
                        <?php else: ?>
                            Tidak Ada Foto
                        <?php endif; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
