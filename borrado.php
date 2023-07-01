<?php

if(isset($_POST['btn']))
{
	include('db.php');

$ID=$_POST['ID'];

mysqli_query($conexion, "DELETE FROM `datos` WHERE `datos`.`ID` = '$ID'")or die("error al eliminar");

mysqli_close($conexion);

echo "'<br> <br> <br>' Se ha eliminado correctamente";
}

?>
<html>
	<head> 
		<title>Datos eliminados</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="end-styles.css">
		<style>
			*{margin: 0; padding: 0}
		</style>
	</head>
	<body>
		<header>
			<div class="header">
				<img src="https://i.imgur.com/pnMSPNs.png" alt="Logo">
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