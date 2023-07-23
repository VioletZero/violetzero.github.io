<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    // Si la sesión no está iniciada, mostrar un mensaje de alerta de JavaScript y redirigir al usuario a la página de inicio de sesión
    echo "<script>alert('Debe iniciar sesión para acceder a esta página.');</script>";
    header('Location: index.php');
    exit;
}
include('db.php');
$tabla="SELECT * FROM `datos`;";
$resultado = mysqli_query($conexion,$tabla) or die("error de consulta");

echo '<br> <br> <br>';
echo '<table border="1" align="center" style="width:50%"> <tr>';
echo '<th> ID </th>';
echo '<th> Nombres </th>';
echo '<th> Apellidos </th>';
echo '<th> Cédula </th>';
echo '<th> Telefono </th>';
echo '<th> Correo </th>';
echo '<th> Fecha de Consulta </th>';
echo '<th> Motivo de consulta </th>';
echo '<th> Direccion </th>';
echo '<th> Antecedentes personales </th>';
echo '<th> Antecedentes familiares </th>';
echo '<th> Nro. de hijos </th>';
echo '<th> Tratamiento propuesto </th>';
echo '<th> Fecha de procedimiento </th>';
echo '<th> Próxima cita </th>';
echo '<th> Fecha de alta </th>';
echo '<th> Observaciones </th>';
echo '</tr>';

while($consulta = mysqli_fetch_assoc($resultado))
{
	echo '<tr>';
	echo '<td>' . $consulta['ID'] . '</td>';
	echo '<td>' . $consulta['Nombres'] . '</td>';
	echo '<td>' . $consulta['Apellidos'] . '</td>';
	echo '<td>' . $consulta['Cedula'] . '</td>';
	echo '<td>' . $consulta['Telefono'] . '</td>';
	echo '<td>' . $consulta['Correo'] . '</td>';
	echo '<td>' . $consulta['Fecha_consulta'] . '</td>';
	echo '<td>' . $consulta['Motivo_consulta'] . '</td>';
	echo '<td>' . $consulta['Direccion'] . '</td>';
	echo '<td>' . $consulta['AntecedentesPer'] . '</td>';
	echo '<td>' . $consulta['AntecedentesFam'] . '</td>';
	echo '<td>' . $consulta['NroHijos'] . '</td>';
	echo '<td>' . $consulta['TratamientoProc'] . '</td>';
	echo '<td>' . $consulta['FechaProc'] . '</td>';
	echo '<td>' . $consulta['ProxCita'] . '</td>';
	echo '<td>' . $consulta['FechaAlta'] . '</td>';
	echo '<td>' . $consulta['Observaciones'] . '</td>';
	echo '</tr>';
}

mysqli_close($conexion);
?>
<html>
<head>
	<title>Formulario de actualización</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="select-styles.css">
	<style>
		*{margin: 0; padding: 0}
	</style>
</head>
<body>
		<header>
			<div class="header">
				<img src="images/header.png" alt="Logo">
				<div class="header-buttons">
					<form method="POST" action="registro.html">
						<input value="Registrar" type="submit" class="btn btn-info registro" name="btn2"/>
					</form>
				</div>
				<div class="header-buttons">
					<form method="POST" action="eliminado.php">
						<input value="Eliminar" type="submit" class="btn btn-info eliminar" name="btn3"/>
					</form>
				</div>
				<div class="header-buttons">
					<form method="POST" action="actualizado.php">
						<input value="Actualizar" type="submit" class="btn btn-info actualizar" name="btn4"/>
					</form>
				</div>
				<div class="text">
					
				</div>
			</div>
		</header>
<body>
	<form name="Datos" method="POST" action="actualizar.php">
	<center> <H2> Formulario de actualización </H2> <BR> </center>
	<center>
		<br>
		<input type="text" name="id" value="" required placeholder="Inserte el ID del paciente que desea editar">
		<br>
		<input value="Enviar" type="submit" class="btn btn-success" name="btn"/>
		</form>
  	</center>
	<br>
</body>
</html>