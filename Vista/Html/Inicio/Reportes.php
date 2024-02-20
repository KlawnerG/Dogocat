<?php

include ('../Inicio/pdf/fpdf.php');
include ('../../../Modelo/ConexionBD.php');


Class PDF extends FPDF {

    function Header(){
        $this->Cell(-200);
        $this->Image('icono.jpg');
        $this->Ln(10);
        $this->SetFont('Arial', '8', 10);
        $this->Cell(-200);
    }

    function Footer(){
        $this->SetFillColor(20, 05, 19);
        $this->Rect(0, 270, 220, 30, 'F');
        $this->SetY(-20);
        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(255, 255, 255);
        $this->SetX(90);
        $this->Write(5, ' DogoCat');
        $this->Ln();
    }

} 

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->SetY(70);
$pdf->SetX(45);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(79, 59, 120);
$pdf->Cell(59, 9, 'ID', 0, 0, 'C', 1);
$pdf->Cell(59, 9, 'Documento', 0, 0, 'C', 1);
$pdf->Cell(59, 9, 'Nombres', 0, 0, 'C', 1);
$pdf->Cell(59, 9, 'Apellidos', 0, 0, 'C', 1);
$pdf->Cell(59, 9, 'Ciudad', 0, 0, 'C', 1);
$pdf->Cell(59, 9, 'Correo', 0, 0, 'C', 1);
$pdf->Cell(59, 9, 'Telefono', 0, 0, 'C', 1);
$pdf->Cell(59, 9, 'Rol', 0, 0, 'C', 1);
$pdf->Cell(59, 9, 'Contraseña', 0, 0, 'C', 1);

$conexionBD = new ConexionBD();
if ($conexionBD->abrir()) {
    $consulta = "SELECT * FROM tbl_usuarios";
    $conexionBD->consulta($consulta);
    $resultado = $conexionBD->obtenerResult();
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(240, 245, 255);
    while ($row = $resultado->fetch_assoc()) {
        $pdf->SetX(45);
        $pdf->Cell(59, 9, $row['Id_usuario'], 0, 0, 'C', 1);
        $pdf->Cell(59, 9, $row['Documento'], 0, 0, 'C', 1);
        $pdf->Cell(59, 9, $row['Nombres'], 0, 0, 'C',);
        $pdf->Cell(59, 9, $row['Apellidos'], 0, 0, 'C',);
        $pdf->Cell(59, 9, $row['Ciudad'], 0, 0, 'C',);
        $pdf->Cell(59, 9, $row['Correo'], 0, 0, 'C',);
        $pdf->Cell(59, 9, $row['Telefono'], 0, 0, 'C',);
        $pdf->Cell(59, 9, $row['Rol'], 0, 0, 'C',);
        $pdf->Cell(59, 9, $row['Contraseña'], 0, 0, 'C',);
    }
}    