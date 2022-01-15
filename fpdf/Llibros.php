<?php
require('fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo (modificamos esta linea si queremos un logo)
    $this->Image('../assets/img/logouls.png',20,16,25);
    $this->Image('../assets/img/led.jpg', 180,10,17,20);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(95);
    // Título
    $this->Cell(1,20,'BIBLIOTECA DEL CENTRO ESCOLAR SAN ISIDRO' ,0,0,'C');

    $this->Ln(5);

    $this->Cell(190,20,'LISTADO DE LOS LIBROS REGISTRADOS' ,0,0,'C');



    // Salto de línea

 $this->Ln(20);

    $this->Cell(6,10,  'Id', 1, 0, 'C', 0);
    $this->Cell(50,10,  'Titulo', 1, 0, 'C', 0);
    $this->Cell(50,10, 'Autor', 1, 0, 'C', 0);
    $this->Cell(25,10,  'Ejemplares', 1, 0, 'C', 0);
    $this->Cell(35,10,  'Categoria', 1, 0, 'C', 0);
    $this->Cell(30,10,  'Editorial', 1, 1, 'C', 0);
}



}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}


require('../BD/conexionBD.php');


$consulta = $mysqli->query ("SELECT l.idLibro,l.titulo,l.autor,l.anioPublicacion,l.numEjemplares,c.categoria,e.editorial,a.adminNombre FROM libros l INNER JOIN categorias c ON l.idCategoriaLibro=c.idCategoria INNER JOIN editoriales e ON l.idEditorialLibro=e.idEditorial INNER JOIN administradores a ON l.idAdminLibro=a.idAdmin ORDER BY l.idLibro ASC");


$pdf = new PDF();
$pdf ->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while($row = $consulta->fetch_assoc()){
    $pdf->Cell(6,10, $row['idLibro'], 1, 0, 'C', 0);
    $pdf->Cell(50,10, $row['titulo'], 1, 0, 'L', 0);
    $pdf->Cell(50,10, $row['autor'], 1, 0, 'L', 0);
    $pdf->Cell(25,10, $row['numEjemplares'], 1, 0, 'C', 0);
    $pdf->Cell(35,10, $row['categoria'], 1, 0, 'C', 0);
    $pdf->Cell(30,10, $row['editorial'], 1, 1, 'C', 0);

}
$pdf->Output();
?>