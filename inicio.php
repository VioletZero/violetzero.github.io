<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    // Si la sesión no está iniciada, mostrar un mensaje de alerta de JavaScript y redirigir al usuario a la página de inicio de sesión
    echo "<script>alert('Debe iniciar sesión para acceder a esta página.');</script>";
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
	<head> 
		<title>Inicio de sesión exitoso</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="start-styles.css">
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
<!-- Botón para cambiar la contraseña -->
<a href="cambiar-contrasena.php" class="fixed-button">
	<i class="fa fa-key"></i> Cambiar contraseña
</a>
<style>
	/* Estilos para el botón */
	.fixed-button {
		position: fixed;
		bottom: 20px;
		right: 20px;
	}

	/* Estilos para el icono del botón */
	.fixed-button i {
		font-size: 24px;
	}
</style>
    </body>
</html>