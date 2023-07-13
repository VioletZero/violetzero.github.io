<?php

require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\Style\Table;

if (isset($_POST['btn2'])) {
    include('db.php');
    $id = $_POST['id']; // Suponiendo que el usuario ha ingresado el ID a buscar

    $tabla = "SELECT * FROM `datos` WHERE ID = $id";
    $resultado = mysqli_query($conexion, $tabla) or die("error de consulta");

    // Create a new PHPWord object
    $phpWord = new \PhpOffice\PhpWord\PhpWord();

    // Agregar una sección al documento
    $section = $phpWord->addSection();

    // Agregar un encabezado al documento
    $header = $section->addHeader();
    $header->addText('Centro Médico Belleza Total', array('bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

    // Agregar los datos de la tabla al documento
    while ($fila = $resultado->fetch_assoc()) {

        $section->addText("Nombres: " . $fila['Nombres']);
        $section->addText("Apellidos: " . $fila['Apellidos']);
        $section->addText("Cédula: " . $fila['Cedula']);
        $section->addText("Teléfono: " . $fila['Telefono']);
        $section->addText("Correo: " . $fila['Correo']);
        $section->addText("Fecha de consulta: " . $fila['Fecha_consulta']);
        $section->addText("Motivo de consulta: " . $fila['Motivo_consulta']);
        $section->addText("Dirección: " . $fila['Direccion']);
        $section->addText("Antecedentes personales: " . $fila['AntecedentesPer']);
        $section->addText("Antecedentes familiares: " . $fila['AntecedentesFam']);
        $section->addText("Número de hijos: " . $fila['NroHijos']);
        $section->addText("Tratamiento propuesto: " . $fila['TratamientoProc']);
        $section->addText("Fecha de procedimiento: " . $fila['FechaProc']);
        $section->addText("Próxima cita: " . $fila['ProxCita']);
        $section->addText("Fecha de alta: " . $fila['FechaAlta']);
        $section->addText("Observaciones: " . $fila['Observaciones']);

        // Agregar un salto de página después de cada fila
        $section->addPageBreak();

    }

    // Descargar el documento como un archivo de Word
    $nombre_archivo = 'historia_medica.docx';
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment;filename="' . $nombre_archivo . '"');
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('php://output');

    mysqli_close($conexion);
}