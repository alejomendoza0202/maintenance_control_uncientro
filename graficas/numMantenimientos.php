<?php

$inc = include("includes/dbh.inc.php");
if ($inc) {
    $consulta = "SELECT FechaUltMantenimiento, count(*) as mant_dia FROM activos_tecnicos GROUP BY FechaUltMantenimiento";
    $result = mysqli_query($conn, $consulta);
    if ($result) {
        while ($row = $result->fetch_array()) {
            echo "['" . $row['FechaUltMantenimiento'] . "'," . $row['mant_dia'] . "],";
        }
    }
}
