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
        <h2 class="texto-formulario">Registro de usuario</h2>
    </center>
    <center>
    <form name="registro" method="POST" class="registroForm" action="procesar_registro.php">
        <br>
        <input type="text" name="nombre" value="" required placeholder="Nombre y apellido"/>
        <input type="email" name="correo" value="" required placeholder="Correo electrónico"/>
        <input type="text" name="usuario" value="" required placeholder="Nombre de usuario"/>
        <input type="password" name="password" value="" required placeholder="Contraseña"/>
        <input value="Registrar" type="submit" class="btn btn-success btn-registrar" name="btn1"/>
    </form>
</center>
</body>
</html>