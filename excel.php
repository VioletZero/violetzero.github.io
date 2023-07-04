<?php

require_once 'vendor/autoload.php';

if(isset($_POST['btn2']))
{
    include('db.php');
    $id = $_POST['id']; // Suponiendo que el usuario ha ingresado el ID a buscar

    $tabla="SELECT * FROM `datos` WHERE ID = $id";
    $resultado = mysqli_query($conexion,$tabla) or die("error de consulta");

    $writer = \Box\Spout\Writer\WriterFactory::create(\Box\Spout\Common\Type::XLSX);

    $writer->openToBrowser('historias_medicas.xlsx');

    $writer->addRow(['ID', 'Nombres', 'Apellidos', 'Cedula', 'Telefono', 'Correo', 'Fecha de Consulta', 'Motivo de consulta', 'Direccion', 'Antecedentes personales', 'Antecedentes familiares', 'Nro. de hijos', 'Tratamiento propuesto', 'Fecha de procedimiento', 'Próxima cita', 'Fecha de alta', 'Observaciones']);

    while ($fila = $resultado -> fetch_assoc()){
        $writer->addRow([$fila['ID'], $fila['Nombres'], $fila['Apellidos'], $fila['Cedula'], $fila['Telefono'], $fila['Correo'], $fila['Fecha_consulta'], $fila['Motivo_consulta'], $fila['Direccion'], $fila['AntecedentesPer'], $fila['AntecedentesFam'], $fila['NroHijos'], $fila['TratamientoProc'], $fila['FechaProc'], $fila['ProxCita'], $fila['FechaAlta'], $fila['Observaciones']]);
    }

    $writer->close();

    mysqli_close($conexion);
}
?>