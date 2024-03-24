<?php
// Incluir conexión a la base de datos
require 'db_connect.php';

// Iniciar sesión para usar variables de sesión
session_start();

//Definimos variables para mensajes de error
$usuarioErr = $passwordErr = $error = "";

// Definir la función para limpiar los datos de entrada
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// Comprobar si el formulario de login ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        //Validar nombre de usuario
        if (empty($_POST['Usuario'])) {
            $usuarioErr = "El nombre de usuario es requerido.";
        } else {
            $usuario = test_input($_POST['Usuario']);
            echo $usuario;
            // Validar si el nombre de usuario contiene solo letras
            if (!preg_match("/^[a-zA-Z]*$/", $usuario)) {
                $usuarioErr = "Solo se permiten letras en el nombre de usuario.";
            }
        }
        //Validar contraseña
        if (empty($_POST['Password'])) {
            $passwordErr = "La contraseña es requerida.";
        } else {
            $password = test_input($_POST['Password']);
            // Validar longitud máxima de contraseña
            if (strlen($password) > 10) {
                $passwordErr = "La contraseña debe tener máximo 10 caracteres.";
            }
        }

        //Verificación de credenciales 
        if (empty($usuarioErr) && empty($passwordErr)) {
            // Validar credenciales del usuario
            // Consulta SQL
            $sql = "SELECT id FROM usuarios WHERE Usuario = ? AND Password = ?";

            // Preparar la consulta
            $stmt = $conn->prepare($sql);

            // Asignar parámetros y ejecutar la consulta
            $stmt->execute([$usuario, $password]);

            // Obtener el número de filas afectadas
            $num_filas = $stmt->rowCount();



            // Verificar si el usuario existe y la contraseña es correcta
            if ($num_filas == 1) {
                // El usuario existe, iniciar sesión
                $_SESSION['Usuario'] = $usuario;

                // Cerrar conexión (al final de tu script, cuando ya no necesites la conexión)
                $conn = null;
                // Redirigir al dashboard
                header("location: inicio.html");
            } else {
                // Usuario o contraseña incorrectos
                $error = "El nombre de usuario o la contraseña no son correctos.";
                // Usuario o contraseña incorrectos, redirigir a la página de inicio de sesión con un mensaje de error
                header("Location: login.html?error=$error");
                exit();
            }
        }
    } catch (PDOException $e) {
        // En caso de error, mostrar mensaje de error
        echo "Error: " . $e->getMessage();
    }
}
