<?php
require('config.php'); // Koneksi database
require('fpdf.php'); // Pustaka FPDF

// Ambil data siswa dari database
$query = "SELECT * FROM calon_siswa"; // Ganti dengan nama tabel siswa Anda
$result = mysqli_query($db, $query);

// Buat array data siswa
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Mulai pembuatan file PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Header tabel
$pdf->Cell(10, 10, 'No', 1);
$pdf->Cell(50, 10, 'Nama', 1);
$pdf->Cell(80, 10, 'Alamat', 1);
$pdf->Cell(30, 10, 'Jenis Kelamin', 1);
$pdf->Ln();

// Isi tabel
$no = 1;
foreach ($data as $row) {
    $pdf->Cell(10, 10, $no++, 1);
    $pdf->Cell(50, 10, $row['nama'], 1);
    $pdf->Cell(80, 10, $row['alamat'], 1);
    $pdf->Cell(30, 10, $row['jenis_kelamin'], 1);
    $pdf->Ln();
}

// Output file PDF
$pdf->Output('D', 'daftar_siswa.pdf'); // File akan ter-download otomatis
?>
