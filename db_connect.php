<?php
// Parámetros de conexión a la base de datos
$servername = "localhost"; // El servidor donde se encuentra la base de datos
$username = "nombre_de_usuario"; // nombre de usuario de la base de datos
$password = "contraseña"; // contraseña de la base de datos
$dbname = "nombre_de_base_de_datos"; //  nombre de base de datos

// Crear conexión
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}
