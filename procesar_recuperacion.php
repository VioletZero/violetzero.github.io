<?php
// Incluye el archivo db.php
include('db.php');

// Verificación de correo electrónico o nombre de usuario
$usuario = $_POST['usuarioo'];

$sql = "SELECT * FROM usuarios WHERE correo = '$usuario' OR usuario = '$usuario'";
$resultado = $conexion->query($sql);

if ($resultado === false) {
    // Si la consulta SQL falla, muestra un mensaje de error al usuario.
    echo "Error en la consulta SQL: " . $conexion->error;
} else {
    if ($resultado->num_rows > 0) {
        // Si el correo electrónico o nombre de usuario está registrado, generar una contraseña temporal y almacenarla en la base de datos junto con el correo electrónico o nombre de usuario correspondiente. Luego, mostrar la contraseña temporal al usuario en la pantalla.
        $contrasena_temporal = uniqid();
        $contrasena_encriptada = password_hash($contrasena_temporal, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET password = '$contrasena_encriptada' WHERE correo = '$usuario' OR usuario = '$usuario'";
        $conexion->query($sql);
        echo "<br><br><br>Su contraseña temporal es: $contrasena_temporal. Por favor, cámbiela lo antes posible. <a href='index.php'>Ir a la página de inicio</a>";
    } else {
        // Si el correo electrónico o nombre de usuario no está registrado, mostrar un mensaje de error al usuario.
        echo "El correo electrónico o nombre de usuario ingresado no está registrado.";
    }
}

// Cierra la conexión a la base de datos
$conexion->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Recuperacion de contraseña</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="index-styles.css">
  <style>
    *{margin: 0; padding: 0;}
  </style>
</head>
<body>
<header>
  <div class="header">
    <img src="images/header.png" alt="Logo">
    <h2 class="texto-centrado">Centro Médico Belleza Total</h2>
  </div>
</header>
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>