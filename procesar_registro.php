<?php
// Incluye el archivo de conexión a la base de datos
include_once 'db.php';

// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibe los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Cifra la contraseña
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepara la consulta para insertar los datos en la base de datos
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, usuario, password) VALUES (?, ?, ?, ?)");

    // Asigna los valores a los parámetros de la consulta
    $stmt->bind_param("ssss", $nombre, $correo, $usuario, $hash);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        // Redirige al usuario a la página de inicio de sesión
        header('Location: index.php?mensaje=Usuario registrado exitosamente. Por favor, inicie sesión.');
        exit;
    } else {
        // Si hay un error en la consulta, muestra un mensaje de error
        $mensaje = 'Ocurrió un error al registrar el usuario. Por favor, inténtelo de nuevo.';
    }
}
?>