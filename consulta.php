<?php
include('db.php');
$tabla="SELECT * FROM `datos`;";
$resultado = mysqli_query($conexion,$tabla) or die("error de consulta");

echo '<br> <br> <br>';
echo '<table border="1" align="center" id="tabla-datos">';
echo '<th> ID </th>';
echo '<th> Nombres </th>';
echo '<th> Apellidos </th>';
echo '<th> Cédula </th>';
echo '<th> Telefono </th>';
echo '<th> Correo </th>';
echo '<th> Fecha de Consulta </th>';
echo '<th> Motivo de consulta </th>';
echo '<th> Direccion </th>';
echo '<th> Antecedentes personales </th>';
echo '<th> Antecedentes familiares </th>';
echo '<th> Nro. de hijos </th>';
echo '<th> Tratamiento propuesto </th>';
echo '<th> Fecha de procedimiento </th>';
echo '<th> Próxima cita </th>';
echo '<th> Fecha de alta </th>';
echo '<th> Observaciones </th>';
echo '</tr>';

while($consulta = mysqli_fetch_assoc($resultado))
{
	echo '<tr>';
	echo '<td>' . $consulta['ID'] . '</td>';
	echo '<td>' . $consulta['Nombres'] . '</td>';
	echo '<td>' . $consulta['Apellidos'] . '</td>';
	echo '<td>' . $consulta['Cedula'] . '</td>';
	echo '<td>' . $consulta['Telefono'] . '</td>';
	echo '<td>' . $consulta['Correo'] . '</td>';
	echo '<td>' . $consulta['Fecha_consulta'] . '</td>';
	echo '<td>' . $consulta['Motivo_consulta'] . '</td>';
	echo '<td>' . $consulta['Direccion'] . '</td>';
	echo '<td>' . $consulta['AntecedentesPer'] . '</td>';
	echo '<td>' . $consulta['AntecedentesFam'] . '</td>';
	echo '<td>' . $consulta['NroHijos'] . '</td>';
	echo '<td>' . $consulta['TratamientoProc'] . '</td>';
	echo '<td>' . $consulta['FechaProc'] . '</td>';
	echo '<td>' . $consulta['ProxCita'] . '</td>';
	echo '<td>' . $consulta['FechaAlta'] . '</td>';
	echo '<td>' . $consulta['Observaciones'] . '</td>';
	echo '</tr>';
}

mysqli_close($conexion);
?>
<!DOCTYPE html>
<html>
	<head> 
		<title>Consulta de datos</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="select-styles.css">
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
						<input value="Registrar" type="submit" class="btn btn-info registro" name="btn"/>
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
				<div class="text">
					
				</div>
			</div>
		</header>
		<button id="recargar">Recargar</button>
		<script>
			document.getElementById("recargar").addEventListener("click", function() {
				location.reload();
			});
		</script>
	<center>
		<form name="Datos" method="POST" class="searchform" action=word.php >
			<input type="text" name="id" value="" required placeholder="Inserte el id del paciente que desea imprimir"/>
			<br>
			<input value="Enviar" type="submit" class="btn btn-success btn-enviar" name="btn2"/>
			<br>
		</form>
		<button onclick="findText()" class="btn-busqueda">Buscar</button>
		<br> <br>
	</center>
	<script>
function findText() {
  var searchText = prompt("Ingrese el dato del paciente que desea buscar:");
  if (searchText) {
    // Elimina el resaltado anterior
    var highlightedText = document.querySelectorAll("mark");
    for (var i = 0; i < highlightedText.length; i++) {
      highlightedText[i].outerHTML = highlightedText[i].innerHTML;
    }

    // Busca y resalta el nuevo texto solo en la tabla de datos
    var table = document.getElementById("tabla-datos");
    var rows = table.getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
      var cells = rows[i].getElementsByTagName("td");
      for (var j = 0; j < cells.length; j++) {
        var cellText = cells[j].innerHTML;
        if (cellText.indexOf(searchText) != -1) {
          cells[j].innerHTML = cellText.replace(new RegExp(searchText, "gi"), "<mark>$&</mark>");
        }
      }
    }
  }
}
	</script>
	</body>
</html>