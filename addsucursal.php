<?php
// Incluir conexión a la base de datos
require 'db_connect.php';

// Iniciar sesión para usar variables de sesión
session_start();

// Capturar valores del formulario
$direccion = $_POST['numero2'];
$telefono = $_POST['numero3'];



// Preparar la consulta INSERT
$sql = "INSERT INTO sucursales (Direccion, NumTelefono) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// Vincular valores a la consulta
mysqli_stmt_bind_param($stmt, "ss", $direccion, $telefono);

// Ejecutar la consulta
if (mysqli_stmt_execute($stmt)) {
  echo "Sucursal agregada exitosamente!";
} else {
  echo "Error al agregar la sucursal: " . mysqli_stmt_error($stmt);
}

// Cerrar la conexión
mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
