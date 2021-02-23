<?php

$inc = include("includes/dbh.inc.php");
if ($inc) {
    $consulta = "SELECT FechaUltMantenimiento, count(*) as mant_dia FROM activos_tecnicos $fechas GROUP BY FechaUltMantenimiento ";
    $result = mysqli_query($conn, $consulta);
    if ($result) {
        $numero = $result->num_rows;
        if ($numero == 0) {
            echo "<p>No hay resultados</p>";
        } else {
            while ($row = $result->fetch_array()) {
                echo "['" . $row['FechaUltMantenimiento'] . "'," . $row['mant_dia'] . "],";
            }
        }
    }
}
