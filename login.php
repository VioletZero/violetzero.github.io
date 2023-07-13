<?php
if(isset($_POST['btn1'])) {
    //recoger informacion de login y crear variable para conexion
    $servername = "localhost";
    $username = $_POST['usuario'];
    $password = $_POST['password'];
    $database = "pacientes";

    $conexion= new mysqli($servername, $username, $password, $database); 

    if ($conexion->connect_error) {  
        // si la conexión falla, guardar mensaje de error en variable y redirigir a la página de inicio de sesión
        $mensaje = "Usuario o contraseña inválidos";
        header("Location: index.php?mensaje=$mensaje");
        exit;
    }
    else {
        // si la conexión es exitosa, mostrar mensaje de bienvenida
        $mensaje = "Bienvenido al sistema! Seleccione qué desea ejecutar";
        echo "<script>alert('$mensaje');</script>";
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
