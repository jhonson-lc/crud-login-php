<?php

require('../fpdf184/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(70);
        // Título
        $this->Cell(70,15,'Reporte de Estudiantes UTA',1,0,'C');
        // Salto de línea
        $this->Ln(20);

        $this->Cell(38, 10, 'Cedula', 1, 0, 'C', 0);
        $this->Cell(38, 10, 'Nombre', 1, 0, 'C', 0);
        $this->Cell(38, 10, 'Apellido', 1, 0, 'C', 0);
        $this->Cell(38, 10, 'Direccion', 1, 0, 'C', 0);
        $this->Cell(38, 10, 'Telefono', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

require "conexion.php";
$consulta = "SELECT * FROM estudiantes";
$resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(38, 10, $row['CED_EST'], 1, 0, 'C', 0);
    $pdf->Cell(38, 10, $row['NOM_EST'], 1, 0, 'C', 0);

    $pdf->Cell(38, 10, $row['APE_EST'], 1, 0, 'C', 0);
    $pdf->Cell(38, 10, $row['DIR_EST'], 1, 0, 'C', 0);
    $pdf->Cell(38, 10, $row['TEL_EST'], 1, 1, 'C', 0);
}

$pdf->Output();
