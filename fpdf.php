<?php
require('fpdf.php');
include 'db_connect.php'; // Pastikan file ini berisi koneksi ke database

class PDF extends FPDF {
    // Page header
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Data Kategori', 0, 1, 'C');
        $this->Ln(10);
    }

    // Page footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Table with category data
    function CategoryTable($header, $data) {
        $this->SetFont('Arial', 'B', 12);
        foreach ($header as $col) {
            $this->Cell(40, 7, $col, 1);
        }
        $this->Ln();
        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            $this->Cell(40, 6, $row['name'], 1); // Ganti $col dengan $row['name']
            $this->Ln();
        }
    }
}

// Create instance of PDF class
$pdf = new PDF();
$pdf->AddPage();
$header = array('Nama Kategori');
$data = array();

// Fetch data from database
$result = $conn->query("SELECT name FROM categories");
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Generate table in PDF
$pdf->CategoryTable($header, $data);

// Output the PDF
$pdf->Output();
?>
