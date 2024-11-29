<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
</head>

<body>
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
        <a href="cetak-siswa.php" target="_blank">Cetak PDF</a>
    </nav>

    <br>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>Foto</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Ambil data dari database
            $query = "SELECT * FROM calon_siswa";
            $result = mysqli_query($db, $query);
            $no = 1;

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$no}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['alamat']}</td>";
                echo "<td>{$row['jenis_kelamin']}</td>";
                echo "<td>{$row['agama']}</td>";
                echo "<td>{$row['sekolah_asal']}</td>";
                echo "<td><img src='uploads/{$row['foto']}' width='100'></td>";
                echo "<td>";
                echo "<a href='edit.php?id={$row['id']}'>Edit</a> | ";
                echo "<a href='hapus.php?id={$row['id']}'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($result); ?></p>
</body>
</html>
