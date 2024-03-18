<?php
// Incluir conexión a la base de datos
require 'db_connect.php';

// Iniciar sesión para usar variables de sesión
session_start();

//Definimos variables para mensajes de error
$usuarioErr = $passwordErr = $error = "";

// Comprobar si el formulario de login ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Validar nombre de usuario
    if (empty($_POST['usuario'])){
    $usuarioErr = "El nombre de usuario es requerido.";
    } else {
        $usuario = test_input($_POST['usuario']);
        // Validar si el nombre de usuario contiene solo letras
        if (!preg_match("/^[a-zA-Z]*$/", $usuario)) {
            $usuarioErr = "Solo se permiten letras en el nombre de usuario.";
        }
    }
    //Validar contraseña
    if (empty($_POST['password'])) {
        $passwordErr = "La contraseña es requerida.";
    } else {
        $password = test_input($_POST['password']);
        // Validar longitud máxima de contraseña
        if (strlen($password) > 10) {
            $passwordErr = "La contraseña debe tener máximo 10 caracteres.";
        }
    }

    //Verificación de credenciales 
    if (empty($usuarioErr) && empty($passwordErr)) {
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

//Función para limpiar los datos de entrada
function test_input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
}
?>