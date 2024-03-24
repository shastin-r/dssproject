<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // El servidor donde se encuentra la base de datos
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "dssproyecto"; // Nombre de la base de datos

try {
    // Crear conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Configurar el modo de error PDO para que lance excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    // En caso de error, mostrar mensaje de error
    die("Conexión fallida: " . $e->getMessage());
}

// Cerrar conexión 
// $conn = null;
?>
