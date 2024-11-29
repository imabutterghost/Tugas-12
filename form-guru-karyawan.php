<!DOCTYPE html>
<html>
<head>
    <title>Formulir Guru dan Karyawan Baru</title>
</head>
<body>
    <h3>Formulir Pendaftaran Guru dan Karyawan</h3>
    <form action="proses-guru-karyawan.php" method="POST" enctype="multipart/form-data">
        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" required>
        </p>
        <p>
            <label for="jenis">Jenis: </label>
            <select name="jenis" required>
                <option value="Guru">Guru</option>
                <option value="Karyawan">Karyawan</option>
            </select>
        </p>
        <p>
            <label for="jabatan">Jabatan: </label>
            <input type="text" name="jabatan" required>
        </p>
        <p>
            <label for="gaji">Gaji: </label>
            <input type="number" name="gaji" required>
        </p>
        <p>
            <label for="foto">Foto: </label>
            <input type="file" name="foto">
        </p>
        <p>
            <button type="submit" name="submit">Daftar</button>
        </p>
    </form>
</body>
</html>
