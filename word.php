<?php

require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\Style\Table;

// ...

if (isset($_POST['btn2'])) {
    include('db.php');
    $id = $_POST['id'];

    // Obtener los datos del registro con el ID especificado
    $tabla = "SELECT * FROM `datos` WHERE ID = $id";
    $resultado = mysqli_query($conexion, $tabla) or die("error de consulta");
    $fila = mysqli_fetch_assoc($resultado);

    // Crear el documento de Word
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();

    $section->addTextBreak();

    // Agregar un título al documento
    $section->addText('Historia Médica', array('bold' => true, 'size' => 16), array('alignment' => Jc::CENTER));

    // Agregar un encabezado al documento
    $header = $section->addHeader();
    $header->addText('Centro Médico Belleza Total', array('bold' => true, 'size' => 14), array('alignment' => Jc::CENTER));

    // Agregar un salto de párrafo
    $section->addTextBreak();

    // Crear la tabla
    $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '999999'));

    // Agregar los valores a la tabla
    $table->addRow();
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Nombres y apellidos:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['Nombres'] . ' ' . $fila['Apellidos'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Cédula:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText('C.I ' . $fila['Cedula'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addRow();
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Teléfono:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['Telefono'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Correo electrónico:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['Correo'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addRow();
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Dirección:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['Direccion'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Motivo de consulta:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['Motivo_consulta'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addRow();
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Tratamiento propuesto:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['TratamientoProc'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Fecha de Consulta:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['Fecha_consulta'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addRow();
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Antecedentes Personales:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['AntecedentesPer'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Antecedentes Familiares:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['AntecedentesFam'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addRow();
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Fecha de procedimiento:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['FechaProc'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Próxima Cita:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['ProxCita'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addRow();
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Fecha de Alta:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['FechaAlta'], array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(4000, array('bold' => true, 'valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left', 'bgColor' => 'cccccc'))->addText('Observaciones:', array('size' => 12), array('alignment' => Jc::CENTER));
    $table->addCell(8000, array('valign' => 'center', 'cellMargin' => 80, 'alignment' => 'left'))->addText($fila['Observaciones'], array('size' => 12), array('alignment' => Jc::CENTER));

    // Descargar el documento
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment;filename="historia_medica.docx"');
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('php://output');
    exit();
}