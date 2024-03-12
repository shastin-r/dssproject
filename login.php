<?php
// Incluir conexión a la base de datos
require 'db_connect.php';

// Iniciar sesión para usar variables de sesión
session_start();

// Comprobar si el formulario de login ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asignar valores a variables
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Validar credenciales del usuario
    $sql = "SELECT id FROM usuarios WHERE usuario = ? AND password = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $stmt->store_result();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($stmt->num_rows == 1) {
            // El usuario existe, iniciar sesión
            $_SESSION['usuario'] = $usuario;
            // Redirigir al dashboard
            header("location: dashboard.php");
        } else {
            // Usuario o contraseña incorrectos
            $error = "El nombre de usuario o la contraseña no son correctos.";
        }
        $stmt->close();
    }
}
$mysqli->close();
