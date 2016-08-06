<?php

require('fpdf/fpdf.php');
require('conexion2.php');

class PDF extends FPDF {

    var $widths;
    var $aligns;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data) {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border

            $this->Rect($x, $y, $w, $h);

            $this->MultiCell($w, 5, $data[$i], 0, $a, 'true');
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l+=$cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

    function Header() {

        $this->SetFont('Arial', '', 20);
        $this->Text(18, 20, 'School Report Booklet', 0, 'C', 0);
        $this->Ln(10);
    }

}

$paciente = $_POST['id'];


$con = new DB;
$pacientes = $con->conectar();
$pacientes2 = $con->conectar();

$nivel = '0';
$curso = '0';

if ($_POST['id_curso'] > '0') {
    $curso = $_POST['id_curso'];

    $strConsulta2 = "SELECT * from curso where id_curso =  '$curso'";
    $pacientes2 = mysql_query($strConsulta2);
    $fila2 = mysql_fetch_array($pacientes2);
    $strConsulta2 = "select  materia.nombre, calificacion, anho
                    from alumno_materia
                    INNER JOIN alumno ON alumno_materia.id_alumno = alumno.id_alumno
                    INNER JOIN materia on alumno_materia.id_materia = materia.id_materia
                    where alumno.id_alumno  = '$paciente' and materia.id_curso = '$curso' and materia.borrado is null";
    
    $cursoNombre = $fila2['curso'];
}

if ($_POST['id_nivel'] > '0') {
    $nivel = $_POST['id_nivel'];
    $strConsulta2 = "SELECT * from nivel where id_nivel =  '$nivel'";
    $pacientes2 = mysql_query($strConsulta2);
    $fila2 = mysql_fetch_array($pacientes2);
    
     $strConsulta2 = "select  nivel_unidades.unidades AS nombre, alumno_unidades.calificacion,alumno_unidades.anho
                    from alumno_unidades
                    INNER JOIN alumno ON alumno_unidades.id_alumno = alumno.id_alumno
                    inner join nivel_unidades on alumno_unidades.id_nivel_unidades = nivel_unidades.id_nivel_unidades
                    where alumno.id_alumno  = '$paciente'  and nivel_unidades.id_nivel = '$nivel'";
     
//     echo 'Entro ', $strConsulta2;
     $cursoNombre = $fila2['nivel'];
}

if (($curso > '0') and ( $nivel > '0')) {
    header('Location: error.php?cod=3');
}
if (($curso == '0') and ( $nivel == '0')) {
    header('Location: error.php?cod=3');
}




$strConsulta = "SELECT * from alumno where id_alumno =  '$paciente'";
$pacientes = mysql_query($strConsulta);
$fila = mysql_fetch_array($pacientes);



$pdf = new PDF('P', 'mm', 'a4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetMargins(20, 20, 20);
$pdf->Ln(4);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 6, "Student's Name: " . $fila['nombre'], 0, 1);
$pdf->Cell(0, 7, "Level: " . $cursoNombre . '         '
        . '                                       '
        . '                                        '
        . '', 0, 1);

$pdf->Ln(4);

$pdf->SetWidths(array(120, 30, 20));
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(00, 0, 0);
$pdf->SetTextColor(255);

for ($i = 0; $i < 1; $i++) {
    $pdf->Row(array('Materia', 'Calificacion', 'Anho'));
}

$historial = $con->conectar();
//$strConsulta = "select  materia.nombre, calificacion, anho
//
//from alumno_materia
//
//INNER JOIN alumno ON alumno_materia.id_alumno = alumno.id_alumno
//INNER JOIN materia on alumno_materia.id_materia = materia.id_materia
//
//where alumno.id_alumno  = '$paciente'";


//echo $strConsulta;


$historial = mysql_query($strConsulta2);
$numfilas = mysql_num_rows($historial);

for ($i = 0; $i < $numfilas; $i++) {
    $fila = mysql_fetch_array($historial);
    $pdf->SetFont('Arial', '', 8);



    $calif = $fila['calificacion'];
    if ($fila['calificacion'] == 0) {
        $calif = "-";
    }

    if ($i % 2 == 1) {
        $pdf->SetFillColor(186, 186, 186);
        $pdf->SetTextColor(0);
        $pdf->Row(array($fila['nombre'], $calif, $fila['anho']));
    } else {
        $pdf->SetFillColor(186, 186, 186);
        $pdf->SetTextColor(0);
        $pdf->Row(array($fila['nombre'], $calif, $fila['anho']));
    }
}

$pdf->Image('images/logo_print.jpg', 50, 230, 130, 40, 'JPG');



$pdf->Output();
?>