<!DOCTYPE html>
<html>
	<head> 
		<title>Datos enviados</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="end-styles.css">
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
						<input value="Registrar" type="submit" class="btn btn-info registro" name="btn1"/>
					</form>
				</div>
				<div class="header-buttons">
					<form method="POST" action="consulta.php">
						<input value="Consultar" type="submit" class="btn btn-info consulta" name="btn2"/>
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
				</div>
			</div>
		</header>
	</body>
</html>
<?php
if(isset($_POST['btn']))
{
	include('db.php');

	$ID=$_POST['id'];
	$tabla="SELECT * FROM `datos` WHERE ID = '$ID'";
	$resultado = mysqli_query($conexion,$tabla) or die("error de consulta");
	while($consulta = mysqli_fetch_array($resultado))
	{
		// Crea un array para almacenar los nuevos valores
		$nuevos_valores = array();

		// Verifica si cada campo del formulario tiene valor y actualiza solo los que sí lo tienen
		if (!empty($_POST['nombre'])) {
			$nuevos_valores[] = "Nombres = '{$_POST['nombre']}'";
		}
		if (!empty($_POST['apellido'])) {
			$nuevos_valores[] = "Apellidos = '{$_POST['apellido']}'";
		}
		if (!empty($_POST['dni'])) {
			$nuevos_valores[] = "Cedula = '{$_POST['dni']}'";
		}
		if (!empty($_POST['tlf'])) {
			$nuevos_valores[] = "Telefono = '{$_POST['tlf']}'";
		}
		if (!empty($_POST['correo'])) {
			$nuevos_valores[] = "Correo = '{$_POST['correo']}'";
		}
		if (!empty($_POST['fecha'])) {
			$nuevos_valores[] = "Fecha_consulta = '{$_POST['fecha']}'";
		}
		if (!empty($_POST['motiv'])) {
			$nuevos_valores[] = "Motivo_consulta = '{$_POST['motiv']}'";
		}
		if (!empty($_POST['direccion'])) {
			$nuevos_valores[] = "Direccion = '{$_POST['direccion']}'";
		}
		if (!empty($_POST['anteceper'])) {
			$nuevos_valores[] = "AntecedentesPer = '{$_POST['anteceper']}'";
		}
		if (!empty($_POST['antecefam'])) {
			$nuevos_valores[] = "AntecedentesFam = '{$_POST['antecefam']}'";
		}
		if (!empty($_POST['nrohijos'])) {
			$nuevos_valores[] = "NroHijos = '{$_POST['nrohijos']}'";
		}
		if (!empty($_POST['trataprop'])) {
			$nuevos_valores[] = "TratamientoProc = '{$_POST['trataprop']}'";
		}
		if (!empty($_POST['fechaproc'])) {
			$nuevos_valores[] = "FechaProc = '{$_POST['fechaproc']}'";
		}
		if (!empty($_POST['fechaprox'])) {
			$nuevos_valores[] = "ProxCita = '{$_POST['fechaprox']}'";
		}
		if (!empty($_POST['alta'])) {
			$nuevos_valores[] = "FechaAlta = '{$_POST['alta']}'";
		}
		if (!empty($_POST['obser'])) {
			$nuevos_valores[] = "Observaciones = '{$_POST['obser']}'";
		}

		// Si se han actualizado campos, construye la consulta SQL y actualiza la base de datos
		if (count($nuevos_valores) > 0) {
			$sql = "UPDATE `datos` SET " . implode(", ", $nuevos_valores) . " WHERE ID = '$ID'";
			mysqli_query($conexion, $sql) or die("error de actualización");
			echo "'<br> <br> <br>' Los datos se han actualizado correctamente";
		}
		else {
			echo "'<br> <br> <br>' No se ha actualizado ningún campo";
		}
	}

	mysqli_close($conexion);
}

?>
