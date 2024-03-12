<?php
// Incluir conexión a la base de datos
require 'db_connect.php';

// Iniciar sesión para usar variables de sesión
session_start();

// Comprobar si el formulario de registro ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asignar valores a variables
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $dui = $_POST['dui'];
    $password = $_POST['password'];

    // Insertar nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombres, apellidos, correo, usuario, dui, password) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ssssss", $nombres, $apellidos, $correo, $usuario, $dui, $password);
        $stmt->execute();
        echo "Registro exitoso.";
        $stmt->close();
    } else {
        echo "Error al registrar.";
    }
}
$mysqli->close();
?>
