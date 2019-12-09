<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(53);
    // Título
    $this->Cell(80,10,'Reporte de prestamos',1,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(10, 10, '#', 1, 0, 'c',0);
	$this->Cell(30, 10, 'Fecha', 1, 0, 'c',0);
	$this->Cell(33, 10, 'Hora', 1, 0, 'c',0);
	$this->Cell(40, 10, 'Aprendiz', 1, 0, 'c',0);
	$this->Cell(30, 10, 'Elementos', 1, 1, 'c',0);

	//$this->Cell(10, 10, 'N implemento', 1, 0, 'c',0);
	//$this->Cell(10, 10, 'estado', 1, 1, 'c',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Páguina').$this->PageNo().'/{nb}',0,0,'C');
}
}
require'cn.php';
$consulta="SELECT * FROM prestamo";

$res=$mysqli->query($consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


while($row=$res->fetch_assoc()){
	$elemen=mysqli_num_rows($mysqli->query("SELECT * FROM detalle_prestamo where id_prestamo='".$row['id_prestamo']."'"));

	$pdf->Cell(10, 10, $row['id_prestamo'], 1, 0, 'c',0);
	$pdf->Cell(30, 10, $row['fecha_prestamo'], 1, 0, 'c',0);
	$pdf->Cell(33, 10, $row['hora_prestamo'], 1, 0, 'c',0);
	$pdf->Cell(40, 10, $row['numidentifi_persona'], 1, 0, 'c',0);	
	$pdf->Cell(30, 10, $elemen, 1, 1, 'c',0);
	//$tre=   $row['idprestamoa'];
	//$cali="SELECT * FROM calificacion where idprestamoa='".$tre."'";
//$re=$mysqli->query($cali);
//$roow=$re->fetch_assoc();
	//$pdf->Cell(30, 10, $roow['puntuacioncali'], 1, 1, 'c',0);
	//$pdf->Cell(10, 10, $row['idinventario'], 1, 0, 'c',0);
	//$pdf->Cell(10, 10, $row['estadopa'], 1, 1, 'c',0);
}

$pdf->Output();
?>