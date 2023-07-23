<?php
// Incluye el archivo db.php
include('db.php');

// Inicia la sesión
session_start();

// Obtiene el nombre de usuario enviado por el usuario
$nombre_usuario = $_POST['usuario'];

// Busca el ID del usuario en la base de datos
$sql = "SELECT ID FROM usuarios WHERE usuario = '$nombre_usuario'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows == 1) {
	// Obtiene el ID del usuario
	$datos_usuario = $resultado->fetch_assoc();
	$id_usuario = $datos_usuario['ID'];

	// Obtiene las contraseñas enviadas por el usuario
	$contrasena_actual = $_POST['contrasena_actual'];
	$nueva_contrasena = $_POST['nueva_contrasena'];
	$confirmar_contrasena = $_POST['confirmar_contrasena'];

	// Verifica que la contraseña actual sea correcta
	$sql = "SELECT password FROM usuarios WHERE ID = '$id_usuario'";
	$resultado = $conexion->query($sql);

	if ($resultado === false) {
		// Si la consulta SQL falla, muestra un mensaje de error al usuario.
		echo "Error en la consulta SQL: " . $conexion->error;
	} else {
		if ($resultado->num_rows == 1) {
			// Obtiene la contraseña actual del usuario de la base de datos
			$datos_usuario = $resultado->fetch_assoc();
			$contrasena_en_base_de_datos = $datos_usuario['password'];

			// Verifica que la contraseña actual sea correcta
			if (password_verify($contrasena_actual, $contrasena_en_base_de_datos)) {
				// Verifica que la nueva contraseña y la confirmación coincidan
				if ($nueva_contrasena == $confirmar_contrasena) {
					// Cifra la nueva contraseña
					$nueva_contrasena_encriptada = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

					// Actualiza la contraseña en la base de datos
					$sql = "UPDATE usuarios SET password = '$nueva_contrasena_encriptada' WHERE ID = '$id_usuario'";
					$conexion->query($sql);

// Actualiza la contraseña en la base de datos
$sql = "UPDATE usuarios SET password = '$nueva_contrasena_encriptada' WHERE id = '$id_usuario'";
$conexion->query($sql);

// Muestra una alerta de JavaScript indicando que la contraseña se cambió correctamente
echo "<script>alert('La contraseña se cambió correctamente.');</script>";

// Espera 2 segundos antes de redirigir al usuario a la página de inicio
echo "<meta http-equiv='refresh' content='2;URL=inicio.php'>";

exit;
				} else {
					// Si la nueva contraseña y la confirmación no coinciden, muestra un mensaje de error
					$mensaje = 'La nueva contraseña y la confirmación no coinciden. Por favor, inténtelo de nuevo.';
				}
			} else {
				// Si la contraseña actual no es correcta, muestra un mensaje de error
				$mensaje = 'La contraseña actual no es correcta. Por favor, inténtelo de nuevo.';
			}
		} else {
			// Si no se encuentra al usuario en la base de datos, muestra un mensaje de error
			$mensaje = 'No se pudo encontrar al usuario en la base de datos. Por favor, inténtelo de nuevo.';
		}
	}
} else {
	// Si no se encuentra al usuario en la base de datos, muestra un mensaje de error
	$mensaje = 'No se pudo encontrar al usuario en la base de datos. Por favor, inténtelo de nuevo.';
}

// Muestra un mensaje de error si es necesario
if (isset($mensaje)) {
	echo $mensaje;
}
?>