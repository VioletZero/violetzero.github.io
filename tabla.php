<?php
if(isset($_POST['btn-busqueda'])) {
    include('db.php');
    $busqueda = $_POST['busqueda'];
    $tabla = "SELECT * FROM `datos` WHERE `Nombres` LIKE '%$busqueda%' OR `Apellidos` LIKE '%$busqueda%';";
    $resultado = mysqli_query($conexion,$tabla) or die("error de consulta");
    echo '<br> <br> <br>';
    echo '<table border="1" align="center" style="width:50%" id="tabla-datos">';
    echo '<thead>';
    echo '<tr>';
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
    echo '</thead>';
    echo '<tbody>';
    while ($fila = $resultado -> fetch_assoc()){
        echo '<tr>';
        echo '<td>' . $fila['ID'] . '</td>';
        echo '<td>' . $fila['Nombres'] . '</td>';
        echo '<td>' . $fila['Apellidos'] . '</td>';
        echo '<td>' . $fila['Cedula'] . '</td>';
        echo '<td>' . $fila['Telefono'] . '</td>';
        echo '<td>' . $fila['Correo'] . '</td>';
        echo '<td>' . $fila['Fecha_consulta'] . '</td>';
        echo '<td>' . $fila['Motivo_consulta'] . '</td>';
        echo '<td>' . $fila['Direccion'] . '</td>';
        echo '<td>' . $fila['AntecedentesPer'] . '</td>';
        echo '<td>' . $fila['AntecedentesFam'] . '</td>';
        echo '<td>' . $fila['NroHijos'] . '</td>';
        echo '<td>' . $fila['TratamientoProc'] . '</td>';
        echo '<td>' . $fila['FechaProc'] . '</td>';
        echo '<td>' . $fila['ProxCita'] . '</td>';
        echo '<td>' . $fila['FechaAlta'] . '</td>';
        echo '<td>' . $fila['Observaciones'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    mysqli_close($conexion);
    exit();
}
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
                        <input value="Registrar" type="submit" class="btn btn-info registro" name="btn2"/>
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
        <script src="/jquery/jquery-3.7.0.min.js"></script>
        <div class="container">
            <form>
                <input type="text" id="busqueda" name="busqueda" placeholder="Buscar...">
                <input value="Buscar" type="submit" class="btn btn-success btn-buscar" name="btn2"/>
            </form>
            <br> <br> <br>
            <table border="1" align="center" style="width:50%" id="tabla-datos">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Nombres </th>
                        <th> Apellidos </th>
                        <th> Cédula </th>
                        <th> Telefono </th>
                        <th> Correo </th>
                        <th> Fecha de Consulta </th>
                        <th> Motivo de consulta </th>
                        <th> Direccion </th>
                        <th> Antecedentes personales </th>
                        <th> Antecedentes familiares </th>
                        <th> Nro. de hijos </th>
                        <th> Tratamiento propuesto </th>
                        <th> Fecha de procedimiento </th>
                        <th> Próxima cita </th>
                        <th> Fecha de alta </th>
                        <th> Observaciones </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('db.php');
                        $tabla = "SELECT * FROM `datos`";
                        $resultado = mysqli_query($conexion,$tabla) or die("error de consulta");
                        while ($fila = $resultado -> fetch_assoc()){
                            echo '<tr>';
                            echo '<td>' . $fila['ID'] . '</td>';
                            echo '<td>' . $fila['Nombres'] . '</td>';
                            echo '<td>' . $fila['Apellidos'] . '</td>';
                            echo '<td>' . $fila['Cedula'] . '</td>';
                            echo '<td>' . $fila['Telefono'] . '</td>';
                            echo '<td>' . $fila['Correo'] . '</td>';
                            echo '<td>' . $fila['Fecha_consulta'] . '</td>';
                            echo '<td>' . $fila['Motivo_consulta'] . '</td>';
                            echo '<td>' . $fila['Direccion'] . '</td>';
                            echo '<td>' . $fila['AntecedentesPer'] . '</td>';
                            echo '<td>' . $fila['AntecedentesFam'] . '</td>';
                            echo '<td>' . $fila['NroHijos'] . '</td>';
                            echo '<td>' . $fila['TratamientoProc'] . '</td>';
                            echo '<td>' . $fila['FechaProc'] . '</td>';
                            echo '<td>' . $fila['ProxCita'] . '</td>';
                            echo '<td>' . $fila['FechaAlta'] . '</td>';
                            echo '<td>' . $fila['Observaciones'] . '</td>';
                            echo '</tr>';
                        }
                        mysqli_close($conexion);
                    ?>
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function() {
                $('#busqueda').on('keyup', function() {
                    var texto = $(this).val().toLowerCase();
                    $.ajax({
                        type: "POST",
                        url: "tabla.php",
                        data: { busqueda: texto },
                        success: function(response) {
                            $('#tabla-datos tbody').html(response);
                        }
                    });
                });
            });
        </script>
    </body>
</html>