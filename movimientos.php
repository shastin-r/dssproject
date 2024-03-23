<?php
               // Incluir conexión a la base de datos
require 'db_connect.php';

// Iniciar sesión para usar variables de sesión
session_start();      
                     // Consulta para obtener los últimos movimientos
                     $sql = "SELECT Fecha, TipoMovimiento, IDCuentaBancaria, Monto FROM movimientos ORDER BY Fecha DESC LIMIT 10";
                     $result = $conn->query($sql);
                     
                     if ($result->num_rows > 0) {
                         // Imprimir los resultados en una tabla
                         echo '<div class="tabla">';
                         echo '<h3 class="titulo2">Últimos movimientos</h3>';
                         echo '<div class="table-container">';
                         echo '<table>';
                         echo '<thead>';
                         echo '<tr>';
                         echo '<th>Fecha</th>';
                         echo '<th>Tipo de Movimiento</th>';
                         echo '<th>Cuenta</th>';
                         echo '<th>Monto</th>';
                         echo '</tr>';
                         echo '</thead>';
                         echo '<tbody>';
                     
                         while ($row = $result->fetch_assoc()) {
                             echo '<tr>';
                             echo '<td>' . $row["Fecha"] . '</td>';
                             echo '<td>' . $row["TipoMovimiento"] . '</td>';
                             echo '<td>' . $row["IDCuentaBancaria"] . '</td>';
                             echo '<td>' . $row["Monto"] . '</td>';
                             echo '</tr>';
                         }
                     
                         echo '</tbody>';
                         echo '<tfoot>';
                         echo '<tr>';
                         echo '<td colspan="4"></td>';
                         echo '</tr>';
                         echo '</tfoot>';
                         echo '</table>';
                         echo '</div>';
                         echo '</div>';
                     } else {
                         echo "No se encontraron movimientos.";
                     }
                     
                     ?>