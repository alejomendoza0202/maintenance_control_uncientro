<?php

$inc = include("includes/dbh.inc.php");
if ($inc) {
    $i = 0;
    $consulta = "SELECT tecnicos.IDTecnico, tecnicos.nombreTecnico, COUNT(*) AS 'numeroMantenimientos', SUM(activos_tecnicos.retraso) as 'numeroRetrasos' FROM activos_tecnicos INNER JOIN activos ON activos_tecnicos.IDActivo = activos.IDActivo INNER JOIN tecnicos ON activos_tecnicos.IDTecnico = tecnicos.IDTecnico $fechas3 GROUP BY(tecnicos.IDTecnico)";
    $result = mysqli_query($conn, $consulta);
    if ($result) {
        while ($row = $result->fetch_array()) {
            $i = $i + 1;
            $IDTecnico = $row['IDTecnico'];
            $nombre = $row['nombreTecnico'];
            $numeroMant = $row['numeroMantenimientos'];
            $numeroRetrasos = $row['numeroRetrasos'];

?>
            <button onclick="showHide(<?php echo $i ?>)" class="mantenimientos__fecha btn_drop mantenimientos__p">
                <p class=""><?php echo $nombre ?></p>
            </button>
            <p class="mantenimientos__p"><?php echo $numeroMant ?></p>
            <p class="mantenimientos__p"><?php echo $numeroRetrasos ?></p>
            <div class="dropMenu" id=<?php echo $i ?>>
                <script>
                    function showHide(i) {
                        var x = document.getElementById(i);
                        if (x.style.display === "grid") {
                            x.style.display = "none";
                        } else {
                            x.style.display = "grid";
                        }
                    }
                </script>
            <?php
            showMant($conn, $IDTecnico, $fechas2);
            echo "</div>";
        }
    }
}

function showMant($conn, $IDTecnico, $fechas2)
{
    $consulta = "SELECT activos_tecnicos.FechaUltMantenimiento, activos.nombreActivo, activos_tecnicos.Observaciones FROM activos_tecnicos INNER JOIN activos ON activos_tecnicos.IDActivo = activos.IDActivo INNER JOIN tecnicos ON activos_tecnicos.IDTecnico = tecnicos.IDTecnico  WHERE activos_tecnicos.IDTecnico='$IDTecnico' $fechas2 ORDER BY activos_tecnicos.FechaUltMantenimiento desc";
    $result = mysqli_query($conn, $consulta);
    if ($result) {
        while ($row = $result->fetch_array()) {
            $fechaUlt = $row['FechaUltMantenimiento'];
            $nombreActivo = $row['nombreActivo'];
            $descripcion = $row['Observaciones'];
            ?>
                <p class="mantenimientos__p"><?php echo $fechaUlt ?></p>
                <p class="mantenimientos__p"><?php echo $nombreActivo ?></p>
                <p class="mantenimientos__p"><?php echo $descripcion ?></p>
    <?php
        }
    }
}
    ?>