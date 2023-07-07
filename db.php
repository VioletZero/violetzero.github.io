<?php
//recoger informacion de login y crear variable para conexion
$servername = "localhost";
$username = "root";
$password = "";
$database = "pacientes";

$conexion= new mysqli($servername, $username, $password, $database); 

if ($conexion->connect_error) {  
    die("Conexion fallida: " . $conexion->connect_error);
}
?>