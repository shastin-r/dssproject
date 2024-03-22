<?php
// Parámetros de conexión a la base de datos
$servername = "localhost"; // El servidor donde se encuentra la base de datos
$username = "root"; // nombre de usuario de la base de datos
$password = ""; // contraseña de la base de datos
$dbname = "dssproyecto"; //  nombre de base de datos

// Crear conexión
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}