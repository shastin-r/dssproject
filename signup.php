<?php
// Incluir conexión a la base de datos
require 'db_connect.php';

// Iniciar sesión para usar variables de sesión
session_start();

//Definimos variables para mensajes de error
$nombresErr = $apellidosErr = $correoErr = $usuarioErr = $duiErr = $passwordErr = "";

// Comprobar si el formulario de registro ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar nombres
    if (empty($_POST['Nombres'])) {
        $nombresErr = "El nombre es requerido.";
    } else {
        $nombres = test_input($_POST['Nombres']);
        //Validar que el nombre tenga solo letras
        if (!preg_match("/^[a-zA-Z]+$/", $nombres)) {
            $nombresErr = "Solo se permiten letras en el nombre.";
        }
    }

    //Validar apellidos
    if (empty($_POST['Apellidos'])) {
        $apellidosErr = "Los apellidos es requerido.";
    } else {
        $apellidos = test_input($_POST['Apellidos']);
        //Validar que los apellidos sean solo letras
        if (!preg_match("/^[a-zA-Z]+$/", $apellidos)) {
            $apellidosErr = "Solo se permiten letras en apellido.";
        }
    }

    //Validar correo
    if (empty($_POST['Correo'])) {
        $correoErr = "El correo es requerido.";
    } else {
        $correo = test_input($_POST['Correo']);
        //Validar formato de correo electrónico
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $correoErr = "Formato de correo inválido.";
        }
    }

    //Validar Usuario
    if (empty($_POST['Usuario'])) {
        $usuarioErr = "El nombre de usuario es requerido.";
    } else {
        $usuario = test_input($_POST['Usuario']);
        //Validar que el nombre de usuario solo contenga letras
        if (!preg_match("/^[a-zA-Z]+$/", $usuario)) {
            $usuarioErr = "Solo se permiten letras en el nombre de usuario.";
        }
    }

    //Validar DUI
    if (empty($_POST['DUI'])) {
        $duiErr = "El DUI es requerido.";
    } else {
        $dui = test_input($_POST['DUI']);
        //Validar que el dui solo contenga números y tenga exactos 9 dígitos
        if (!preg_match("/^[0-9]{9}$/", $dui)) {
            $duiErr = "El DUI debe contener 9 dígitos numéricos.";
        }
    }

    //Validar contraseña
    if (empty($_POST['Password'])) {
        $passwordErr = "La contraseña es requerida.";
    } else {
        $password = test_input($_POST['Password']);
    }

    //Si no hay errores, proceder a la inserción en la bdd
    if (empty($nombresErr) && empty($apellidosErr) && empty($correoErr) && empty($usuarioErr) && empty($duiErr) && empty($passwordErr)) {

        // Insertar nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (Nombres, Apellidos, Correo, Usuario, DUI, Password) VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssssss", $nombres, $apellidos, $correo, $usuario, $dui, $password);
            $stmt->execute();
            echo "Registro exitoso.";
            $stmt->close();
        } else {
            echo "Error al registrar.";
        }
    }
}

$mysqli->close();

//Función para limpiar los datos de entrada 
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
