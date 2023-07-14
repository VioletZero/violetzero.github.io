<!DOCTYPE html>
<html>
<head>
  <title>Inicio de sesión</title>
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
        <h2 class="texto-formulario">Inicio de Sesión</h2>
    </center>
    <center>
    <form name="usuario" method="POST" class="loginForm" action="login.php">
        <br>
        <input type="text" name="usuario" value="" required placeholder="Usuario" password/>
        <input type="password" name="password" value="" required placeholder="Contraseña" password/>
        <input value="Enviar" type="submit" class="btn btn-success btn-enviar" name="btn1"/>
    </form>
</center>
</body>
</html>
<?php
if (isset($_GET['mensaje'])) {
    // si hay un mensaje de error en la URL, mostrarlo en la página
    $mensaje = $_GET['mensaje'];
    echo "<script>alert('$mensaje');</script>";
}
?>