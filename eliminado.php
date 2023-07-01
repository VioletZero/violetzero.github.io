<?php

if(isset($_POST['btn3']))
{
	include('db.php');
	$tabla="SELECT * FROM `datos`;";
	$resultado = mysqli_query($conexion,$tabla) or die("error de consulta");
	while($consulta = mysqli_fetch_array($resultado))
	{
		echo '<table border> <tr>';
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
		
		
		while ($fila = $resultado -> fetch_assoc()){
			echo '<tr>';
			echo '<td>' . $fila['ID'] . '</td>';
			echo '<td>' . $fila['Nombres'] . '</td>';
			echo '<td>' . $fila['Apellidos'] . '</td>';
			echo '<td>' . $fila['Cedula'] . '</td>';
			echo '<td>' . $fila['Telefono'] . '</td>';
			echo '<td>' . $fila['Correo'] . '</td>';
			echo '<td>' . $fila['Fecha_consulta'] . '</td>';
			echo '<td>' . $fila['Motivo_consulta'] . '</td>';
			echo '<td>' . $fila['Direccion'] . '</td>';
			echo '<td>' . $fila['AntecedentesPer'] . '</td>';
			echo '<td>' . $fila['AntecedentesFam'] . '</td>';
			echo '<td>' . $fila['NroHijos'] . '</td>';
			echo '<td>' . $fila['TratamientoProc'] . '</td>';
			echo '<td>' . $fila['FechaProc'] . '</td>';
			echo '<td>' . $fila['ProxCita'] . '</td>';
			echo '<td>' . $fila['FechaAlta'] . '</td>';
			echo '<td>' . $fila['Observaciones'] . '</td>';
			echo '</tr>';
			}
	}

mysqli_close($conexion);
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Formulario de eliminación</title>
	<link rel="stylesheet" href="select-styles.css">
	<style>
		*{margin: 0; padding: 0}
	</style>
</head>
<body>
		<header>
			<div class="header">
				<img src="https://i.imgur.com/pnMSPNs.png" alt="Logo">
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
	<center> <br> <br> <br> <br> <H2> Formulario de eliminación </H2> <BR> </center>
	<form name="Datos" method="POST" action="borrado.php">
	<center>
		<br>
		Ingrese el id del paciente que desea eliminar  <input type="text" name="ID" value="" required>
		<input value="Borrar" type="submit" class="btn btn-info" name="btn">
	</center>
</body>
</html>