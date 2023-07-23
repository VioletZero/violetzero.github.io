<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    // Si la sesión no está iniciada, mostrar un mensaje de alerta de JavaScript y redirigir al usuario a la página de inicio de sesión
    echo "<script>alert('Debe iniciar sesión para acceder a esta página.');</script>";
    header('Location: index.php');
    exit;
}
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

echo "<script>
// cambiar el texto de los botones
const confirmBox = window.confirm;
window.confirm = function(message) {
	const options = Object.assign({}, {cancelButtonText: 'Cerrar sesión', confirmButtonText: 'Continuar'});
	return confirmBox.call(window, message, options);
};

if(confirm('Registro completado! ¿Desea continuar o cerrar sesión?')) {
    window.location.href = 'login.php'; // redirigir al usuario a otra página para realizar otra acción
} else {
    // Cerrar la sesión del usuario y redirigirlo a la página de inicio de sesión
    window.location.href = 'cerrar_sesion.php';
}
</script>";


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
	<style>
    .btns {
        display: none;
    }
</style>

<div id="mensaje"></div>

<div class="btns" id="btns">
    <button id="otra_accion">Otra acción</button>
    <button id="cerrar_sesion">Cerrar sesión</button>
</div>
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
		<script>
    // Mostrar los botones después de que se haya completado el registro
    document.getElementById("btns").style.display = "block";

    // Redirigir al usuario a otra página para realizar otra acción
    document.getElementById("otra_accion").addEventListener("click", function() {
        window.location.href = "login.php";
    });

    // Cerrar la sesión del usuario y redirigirlo a la página de inicio de sesión
    document.getElementById("cerrar_sesion").addEventListener("click", function() {
        window.location.href = "index.php";
    });
</script>
	</body>
</html>