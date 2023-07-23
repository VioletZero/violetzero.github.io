<?php

if(isset($_POST['btn'])) {
    include('db.php');
    $IDs = $_POST['ID'];
    $IDs_array = explode(',', $IDs); // convertir la cadena de ID separada por comas en un array
    $num_deleted = 0; // contador para el número de usuarios eliminados

    foreach($IDs_array as $IDs) {
        mysqli_query($conexion, "DELETE FROM `datos` WHERE `datos`.`ID` = '$IDs'") or die("error al eliminar");
        if (mysqli_affected_rows($conexion) > 0) {
            $num_deleted++;
        }
    }

    if ($num_deleted > 0) {
        echo "'<br> <br> <br>' Se han eliminado correctamente $num_deleted usuarios";
    } else {
        echo "'<br> <br> <br>' Ninguno de los ID de usuario proporcionados existe";
    }
    mysqli_close($conexion);
}
?>

<script>
if(confirm('¿Desea mantener su sesión abierta?')) {
    // Si el usuario selecciona "Sí", no se hace nada
} else {
    // Si el usuario selecciona "No", se redirige al usuario a la página de cierre de sesión
    window.location.href = 'cerrar_sesion.php';
}
</script>
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