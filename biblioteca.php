<?php
if(isset($_POST['btn1']))
{
include('db.php');

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$cedula=$_POST['cedula'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$fecha_cons=$_POST['fecha_cons'];
$motivo_cons=$_POST['motivo_cons'];
$direccion=$_POST['direccion'];
$antece_per=$_POST['antece_per'];
$antece_fam=$_POST['antece_fam'];
$num_hijos=$_POST['num_hijos'];
$tratam_prop=$_POST['tratam_prop'];
$fecha_proc=$_POST['fecha_proc'];
$fecha_prox=$_POST['fecha_prox'];
$fecha_alta=$_POST['fecha_alta'];
$obser=$_POST['obser'];



$consulta="INSERT INTO `datos` (`Nombres`, `Apellidos`, `Cedula`, `Telefono`, `Correo`, `Fecha_consulta`, `Motivo_consulta`, `Direccion`, `AntecedentesPer`, `AntecedentesFam`, `NroHijos`, `TratamientoProc`, `FechaProc`, `ProxCita`, `FechaAlta`, `Observaciones`) 
           VALUES ('$nombre', '$apellido', '$cedula', '$telefono', '$correo', '$fecha_cons', '$motivo_cons', '$direccion', '$antece_per', '$antece_fam', '$num_hijos', '$tratam_prop', '$fecha_proc', '$fecha_prox', '$fecha_alta', '$obser');";

$resultado=mysqli_query($conexion,$consulta) or die("error de registro");

echo "'<br>' '<br>' '<br>' Registro completado!";


mysqli_close($conexion);
}
?>
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
				<img src="https://i.imgur.com/pnMSPNs.png" alt="Logo">
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