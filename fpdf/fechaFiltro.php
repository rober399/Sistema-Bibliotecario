
 <?php

require('fpdf.php');
require('../INCLUDES/Fecha.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	global $inicio;
	global $fin;
    global $estado;
	$inicio = $_POST['inicio'];
	$fin = $_POST['fin'];
    $estado = $_POST['estado'];
    // Logo (modificamos esta linea si queremos un logo)
    $this->Image('../assets/img/logouls.png',10,10,25);
    $this->Image('../assets/img/led.jpg', 180,8,17,20);  // Arial bold 15
    $this->SetFont('Arial','B',10);


    // Movernos a la derecha
    $this->Cell(80);
    // Título


    $this->Cell(30,10,'Estado de prestamo: '.$estado,0,0, 'C');
    $this->Ln(10);
    $this->Cell(80);

    $this->Cell(30,10,'Reporte de prestamos desde el: '. $inicio .' hasta el: '.$fin,0,0,'C');
     $this->Ln(5);
     $this->Cell(80);


    $this->Cell(30,10,fechaC(),0,0,'C');
    // Salto de línea
    $this->Ln(15);
    $this->Cell(6,10,  'Id', 1, 0, 'C', 0);
    $this->Cell(25,10,  'Lector', 1, 0, 'C', 0);
	$this->Cell(60,10, 'Libro', 1, 0, 'C', 0);
	$this->Cell(25,10,  'Fecha Inicio', 1, 0, 'C', 0);
    if($estado=='Pendiente'){
    $this->Cell(25,10,  'Fecha Limite', 1, 0, 'C', 0);
    }else if($estado=='Devuelto'){
    $this->Cell(25,10,  'Devuelto', 1, 0, 'C', 0);
    }else if($estado=='Todos'){
    $this->Cell(25,10,  'Fecha Limite', 1, 0, 'C', 0);
    
    }
   
	$this->Cell(25,10,  'Usuario', 1, 0, 'C', 0);
	$this->Cell(20,10,  'Estado', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
//Extraer datos de base de datos
require('../BD/conexionBD.php');
global $inicio;
global $fin;
global $estado;
	$inicio = $_POST['inicio'];
	$fin = $_POST['fin'];
    $estado = $_POST['estado'];


    if($estado=='Pendiente'){


    $consulta = $mysqli->query ("SELECT p.idPrestamo,e.nombreUs, e.apellidoUs, l.titulo,p.fechaPrestamo,p.fechaLimite,a.adminNombre, a.adminApellido, p.estadoPrestamo FROM prestamos p INNER JOIN usuarios e ON p.idUsuarioPrestamo=e.idUsuario INNER JOIN libros l ON p.idLibroPrestamo=l.idLibro INNER JOIN administradores a ON p.idAdminPrestamo=a.idAdmin  WHERE p.fechaPrestamo BETWEEN '$inicio' AND '$fin' AND p.estadoPrestamo='PENDIENTE'  ORDER BY p.idPrestamo ASC");

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

while($row = $consulta ->fetch_assoc()){
    $pdf->Cell(6,10, $row['idPrestamo'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['nombreUs'].$row['apellidoUs'], 1, 0, 'C', 0);
    $pdf->Cell(60,10, $row['titulo'], 1, 0, 'L', 0);
    $pdf->Cell(25,10, $row['fechaPrestamo'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['fechaLimite'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['adminNombre'].$row['adminApellido'], 1, 0, 'C', 0);
    $pdf->Cell(20,10, $row['estadoPrestamo'], 1, 1, 'C', 0);
}



     }else if($estado=='Devuelto'){

          $consulta = $mysqli->query ("SELECT p.idPrestamo,e.nombreUs, e.apellidoUs, l.titulo,p.fechaPrestamo,p.fechaEntrega,a.adminNombre, a.adminApellido, p.estadoPrestamo FROM prestamos p INNER JOIN usuarios e ON p.idUsuarioPrestamo=e.idUsuario INNER JOIN libros l ON p.idLibroPrestamo=l.idLibro INNER JOIN administradores a ON p.idAdminPrestamo=a.idAdmin  WHERE p.fechaPrestamo BETWEEN '$inicio' AND '$fin' AND p.estadoPrestamo='DEVUELTO'  ORDER BY p.idPrestamo ASC");

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

while($row = $consulta ->fetch_assoc()){
    $pdf->Cell(6,10, $row['idPrestamo'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['nombreUs'].$row['apellidoUs'], 1, 0, 'C', 0);
    $pdf->Cell(60,10, $row['titulo'], 1, 0, 'L', 0);
    $pdf->Cell(25,10, $row['fechaPrestamo'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['fechaEntrega'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['adminNombre'].$row['adminApellido'], 1, 0, 'C', 0);
    $pdf->Cell(20,10, $row['estadoPrestamo'], 1, 1, 'C', 0);
}

     }else if($estado=="Todos"){

         $consulta = $mysqli->query ("SELECT p.idPrestamo,e.nombreUs, e.apellidoUs, l.titulo,p.fechaPrestamo,p.fechaLimite,p.fechaEntrega,a.adminNombre, a.adminApellido, p.estadoPrestamo FROM prestamos p INNER JOIN usuarios e ON p.idUsuarioPrestamo=e.idUsuario INNER JOIN libros l ON p.idLibroPrestamo=l.idLibro INNER JOIN administradores a ON p.idAdminPrestamo=a.idAdmin  WHERE p.fechaPrestamo BETWEEN '$inicio' AND '$fin' ORDER BY p.idPrestamo ASC");

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);

while($row = $consulta ->fetch_assoc()){
    $pdf->Cell(6,10, $row['idPrestamo'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['nombreUs'].$row['apellidoUs'], 1, 0, 'C', 0);
    $pdf->Cell(60,10, $row['titulo'], 1, 0, 'L', 0);
    $pdf->Cell(25,10, $row['fechaPrestamo'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['fechaLimite'], 1, 0, 'C', 0);
    $pdf->Cell(25,10, $row['adminNombre'].$row['adminApellido'], 1, 0, 'C', 0);
    $pdf->Cell(20,10, $row['estadoPrestamo'], 1, 1, 'C', 0);
}

     }


   
   



$pdf->Output();
?>