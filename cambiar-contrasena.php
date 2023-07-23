<!DOCTYPE html>
<html>
<head>
  <title>Cambio de contraseña</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="index-styles.css">
  <style>
    *{margin: 0; padding: 0;}
  </style>
</head>
<body>
<header>
  <div class="header">
    <a href="inicio.php"><img src="images/header.png" alt="Logo"></a>
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
		<main>
			<center><h1 class="cambiar-pass">Cambiar contraseña</h1> </center>

			<form method="post" action="procesar-cambio-contrasena.php">
                <input type="text" id="usuario" name="usuario" required placeholder="Nombre de usuario a cambiar">
				<input type="password" id="contrasena_actual" name="contrasena_actual" required placeholder="Contraseña actual">
				<input type="password" id="nueva_contrasena" name="nueva_contrasena" required placeholder="Nueva contraseña">
				<input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required placeholder="Confirmar nueva contraseña">

				<button type="submit" class="btn-cambio-contrasena">Cambiar contraseña</button>
			</form>
		</main>
        <style>
                .btn-cambio-contrasena {
                background-color: rgba(213, 140, 252, 0.8);
                align-items: center;
                width: 105%;
                margin-top: 10px;
                }
                </style>
	</body>
</html>