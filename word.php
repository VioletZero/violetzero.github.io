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

    // Crear la tabla
    $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '999999'));

    // Agregar los encabezados de las columnas
    $table->addRow();
    $table->addCell(4000, array('bgColor' => 'F2F2F2', 'valign' => 'center'))->addText('Campo', array('bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
    $table->addCell(4000, array('bgColor' => 'F2F2F2', 'valign' => 'center'))->addText('Valor', array('bold' => true), array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

    // Agregar los datos de la tabla al documento
    while ($fila = $resultado->fetch_assoc()) {

        // Agregar las filas de la tabla
        $table->addRow();
        $table->addCell(4000)->addText('Nombres:', array('bold' => true));
        $table->addCell(4000)->addText($fila['Nombres']);
        $table->addRow();
        $table->addCell(4000)->addText('Apellidos:', array('bold' => true));
        $table->addCell(4000)->addText($fila['Apellidos']);
        $table->addRow();
        $table->addCell(4000)->addText('Cédula:', array('bold' => true));
        $table->addCell(4000)->addText($fila['Cedula']);
        $table->addRow();
        $table->addCell(4000)->addText('Teléfono:', array('bold' => true));
        $table->addCell(4000)->addText($fila['Telefono']);
        $table->addRow();
        $table->addCell(4000)->addText('Correo:', array('bold' => true));
        $table->addCell(4000)->addText($fila['Correo']);
        $table->addRow();
        $table->addCell(4000)->addText('Dirección:', array('bold' => true));
        $table->addCell(4000)->addText($fila['Direccion']);
        $table->addRow();
        $table->addCell(4000)->addText('Antecedentes personales:', array('bold' => true));
        $table->addCell(4000)->addText($fila['AntecedentesPer']);
        $table->addRow();
        $table->addCell(4000)->addText('Antecedentes familiares:', array('bold' => true));
        $table->addCell(4000)->addText($fila['AntecedentesFam']);
        $table->addRow();
        $table->addCell(4000)->addText('Número de hijos:', array('bold' => true));
        $table->addCell(4000)->addText($fila['NroHijos']);
        $table->addRow();
        $table->addCell(4000)->addText('Tratamiento propuesto:', array('bold' => true));
        $table->addCell(4000)->addText($fila['TratamientoProc']);
        $table->addRow();
        $table->addCell(4000)->addText('Fecha de procedimiento:', array('bold'=> true));
        $table->addCell(4000)->addText($fila['FechaProc']);
        $table->addRow();
        $table->addCell(4000)->addText('Próxima cita:', array('bold' => true));
        $table->addCell(4000)->addText($fila['ProxCita']);
        $table->addRow();
        $table->addCell(4000)->addText('Fecha de alta:', array('bold' => true));
        $table->addCell(4000)->addText($fila['FechaAlta']);
        $table->addRow();
        $table->addCell(4000)->addText('Observaciones:', array('bold' => true));
        $table->addCell(4000)->addText($fila['Observaciones']);

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