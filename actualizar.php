<?php

if(isset($_POST['btn']))
{
	include('db.php');

	$ID=$_POST['id'];
	$tabla="SELECT * FROM `datos` WHERE ID = '$ID'";
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
		if ($consulta['ID'] == $_POST['id']) {
			$data[] = $consulta;
		}
	}

	foreach ($data as $row){
		echo '<tr>';
		echo '<td>' . $row['ID'] . '</td>';
		echo '<td>' . $row['Nombres'] . '</td>';
		echo '<td>' . $row['Apellidos'] . '</td>';
		echo '<td>' . $row['Cedula'] . '</td>';
		echo '<td>' . $row['Telefono'] . '</td>';
		echo '<td>' . $row['Correo'] . '</td>';
		echo '<td>' . $row['Fecha_consulta'] . '</td>';
		echo '<td>' . $row['Motivo_consulta'] . '</td>';
		echo '<td>' . $row['Direccion'] . '</td>';
		echo '<td>' . $row['AntecedentesPer'] . '</td>';
		echo '<td>' . $row['AntecedentesFam'] . '</td>';
		echo '<td>' . $row['NroHijos'] . '</td>';
		echo '<td>' . $row['TratamientoProc'] . '</td>';
		echo '<td>' . $row['FechaProc'] . '</td>';
		echo '<td>' . $row['ProxCita'] . '</td>';
		echo '<td>' . $row['FechaAlta'] . '</td>';
		echo '<td>' . $row['Observaciones'] . '</td>';
		echo '</tr>';
	}
	mysqli_close($conexion);
}
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
	<center> <br> <br> <br> <H2> Formulario de actualización </H2> <BR> </center>
	<form name="Datos" method="POST" class="upform" action="update.php">
	<center>
		<br>
		<input type="text" name="id" value="" required placeholder="Confirme el id a actualizar del paciente"/>
		<br>
		<input type="text" name="nombre" value="" placeholder="Inserte el nombre a actualizar del paciente"/>
		<input type="text" name="apellido" value="" placeholder="Inserte el apellido a actualizar del paciente">
		<br>
		<input type="text" name="dni" value="" placeholder="Inserte la cédula de identidad a actualizar del paciente"/>
		<br>
		<input type="text" name="tlf" value="" placeholder="Inserte el teléfono a actualizar del paciente"/>
		<input type="text" name="correo" value="" placeholder="Inserte el correo a actualizar del paciente"/>
		<br>
		<input placeholder="Inserte la fecha de consulta a actualizar del paciente" class="textbox-n" type="text" onfocus="(this.type='date')" name="fecha" value=""/>
		<br>
		<input type="text" name="motiv" value="" placeholder="Inserte el motivo de consulta a actualizar del paciente"/>
		<input type="text" name="direccion" value="" placeholder="Inserte la dirección a actualizar del paciente"/>
		<br>
		<input type="text" name="anteceper" value="" placeholder="Inserte los antecedentes personales a actualizar del paciente"/>
		<input type="text" name="antecefam" value="" placeholder="Inserte los antecedentes familiares a actualizar del paciente"/>
		<br>
		<input type="number" name="nrohijos" min="0" max="10" value="" placeholder="Inserte el número de hijos a actualizar del paciente"/>
		<input type="text" name="trataprop" value="" placeholder="Inserte el tratamiento propuesto a actualizar del paciente"/>
		<br>
		<input placeholder="Inserte la fecha del procedimiento realizado a actualizar del paciente" clas="textbox-n" type="text" onfocus="(this.type='date')" name="fechaproc" value=""/> 
		<input placeholder="Inserte la fecha de la próxima cita a actualizar del paciente" class="textbox-n" type="text" onfocus="(this.type='date')" name="fechaprox" value=""/>
		<br>
		<input placeholder="Inserte la fecha de alta a actualizar del paciente" class="textbox-n" type="text" onfocus="(this.type='date')" name="alta" value=""/>
		<input type="text" name="obser" value="" placeholder="Inserte las observaciones a actualizar del paciente"/>
		<br>
		<input value="Enviar" type="submit" class="btn btn-success" name="btn"/>
  	</center>
</body>
</html>