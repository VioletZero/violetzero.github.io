<?php

require_once 'vendor/autoload.php';

use Box\Spout\Common\Type;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\WriterFactory;

if (isset($_POST['btn2'])) {
    include('db.php');
    $id = $_POST['id']; // Suponiendo que el usuario ha ingresado el ID a buscar

    $tabla = "SELECT * FROM `datos` WHERE ID = $id";
    $resultado = mysqli_query($conexion, $tabla) or die("error de consulta");

    $writer = WriterEntityFactory::createXLSXWriter();

    $writer->openToBrowser('historias_medicas.xlsx');

    // Set the header image
    //$writer->setDefaultRowStyle(WriterEntityFactory::createStyle(['header-image' => 'images/header.png']));

    $headerRow = WriterEntityFactory::createRowFromArray(['Nombres', 'Apellidos', 'Cedula', 'Telefono', 'Correo', 'Fecha de Consulta', 'Motivo de consulta', 'Direccion', 'Antecedentes personales', 'Antecedentes familiares', 'Nro. de hijos', 'Tratamiento propuesto', 'Fecha de procedimiento', 'Próxima cita', 'Fecha de alta', 'Observaciones']);
    $writer->addRow($headerRow);

    while ($fila = $resultado->fetch_assoc()) {
        $row = WriterEntityFactory::createRowFromArray([$fila['Nombres'], $fila['Apellidos'], $fila['Cedula'], $fila['Telefono'], $fila['Correo'], $fila['Fecha_consulta'], $fila['Motivo_consulta'], $fila['Direccion'], $fila['AntecedentesPer'], $fila['AntecedentesFam'], $fila['NroHijos'], $fila['TratamientoProc'], $fila['FechaProc'], $fila['ProxCita'], $fila['FechaAlta'], $fila['Observaciones']]);
        $writer->addRow($row);
    }

    $writer->close();

    mysqli_close($conexion);
}