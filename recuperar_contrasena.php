<!DOCTYPE html>
<html>
	<head>
		<title>Recuperar contraseña</title>
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
	<body>
		<div class="container">
			<h1>Recuperar contraseña</h1>
      <br>
			<p>Ingrese su dirección de correo electrónico o <br> nombre de usuario para recibir una contraseña temporal.</p>
			<form method="POST" action="procesar_recuperacion.php">
				<label for="usuario"></label>
				<input type="text" name="usuarioo" id="usuario" required placeholder="Ingrese su correo electrónico o nombre de usuario">
				<input type="submit" value="Enviar" class="btn-recuperar">
			</form>
		</div>
	</body>
</html>