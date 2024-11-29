<?php
require('config.php'); // Menghubungkan ke database
require('fpdf/fpdf.php'); // Path ke pustaka FPDF

// Ambil data dari database
$query = "SELECT * FROM guru_karyawan";
$result = mysqli_query($db, $query);

// Buat array data
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Mulai pembuatan PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Header tabel
$pdf->Cell(40, 10, 'No', 1);
$pdf->Cell(50, 10, 'Nama', 1);
$pdf->Cell(30, 10, 'Jenis', 1);
$pdf->Cell(50, 10, 'Jabatan', 1);
$pdf->Cell(40, 10, 'Gaji', 1);
$pdf->Ln();

// Isi tabel
$no = 1;
foreach ($data as $row) {
    $pdf->Cell(40, 10, $no++, 1);
    $pdf->Cell(50, 10, $row['nama'], 1);
    $pdf->Cell(30, 10, $row['jenis'], 1);
    $pdf->Cell(50, 10, $row['jabatan'], 1);
    $pdf->Cell(40, 10, $row['gaji'], 1);
    $pdf->Ln();
}

// Output PDF
$pdf->Output('D', 'guru_karyawan.pdf'); // File akan otomatis di-download
?>
