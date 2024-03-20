<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Ejercicio 1</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Complemento.css">
  <link rel="stylesheet" href="CSS/estilo.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>

<body>

<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="inicio.html">
                   <i class="fas fa-home"></i>
                   <span>Inicio</span> 
                </a>
            </li>
            <li>
                <a href="AgregarSucursal.html">
                   <i class="fas fa-hand-holding-usd"></i>
                   <span>Agregar Sucursal</span> 
                   <!--Se modifica la tabla sucursal para un nuevo registro-->
                </a>
            </li>
            <li class="active">
                <a href="Vermovimientos.php">
                   <i class="fas fa-arrow-down"></i>
                   <span>Ver movimientos</span> 
                   <!--Basicamente es una vista de la tabla llamada Movimientos-->
                </a>
            </li>
            <li class="cerrar">
                <a href="#">
                   <i class="fas fa-sign-out-alt"></i>
                   <span>Cerrar sesión</span> 
                </a>
            </li>
        </ul>
    </div>

    <div class="contenido">
        <div class="header--wrapper">
            <div class="titulo">
                <span>Inicio</span>
                <h2>Banco UDB</h2>
            </div>
            <div class="info">
                <div class="saludo">
                    <h1>Bienvenido Usuario</h1>
                </div>
                <img src="img/usuario.png" alt="usuario">
            </div>
        </div>


        <div class="tabla">
            <h3 class="titulo2"> Ultimos movimientos</h3>
            <div class="table-container">
                <table>
                    <thead>
                    <tr>
                    <th>Fecha</th>
                    <th>Tipo de Movimiento</th>
                    <th>Cuenta</th>
                    <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                     
                     
                     
                     ?>  
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>




    </div>

</body>