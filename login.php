<?php
include_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibe los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Prepara la consulta para buscar al usuario en la tabla de usuarios
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Si el usuario existe, verificar la contraseña
        if (password_verify($password, $row['password'])) {
            // Si la contraseña es correcta, iniciar sesión y redirigir al usuario a la página de inicio
            session_start();
            $_SESSION['usuario'] = $usuario;
            header('Location: inicio.php');
            exit;
        } else {
            // Si la contraseña es incorrecta, mostrar un mensaje de error y redirigir al usuario a la página de inicio de sesión
            $mensaje = 'Contraseña incorrecta. Por favor, inténtelo de nuevo.';
            header("Location: index.php?mensaje=$mensaje");
            exit;
        }
    } else {
        // Si el usuario no existe, mostrar un mensaje de error y redirigir al usuario a la página de inicio de sesión
        $mensaje = 'El usuario no existe. Por favor, registre una cuenta.';
        header("Location: index.php?mensaje=$mensaje");
        exit;
    }
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
    </body>
</html>
