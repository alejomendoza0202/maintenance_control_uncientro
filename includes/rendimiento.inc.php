<?php

$inc = include("includes/dbh.inc.php");
if ($inc) {
    $consulta = "SELECT tecnicos.IDTecnico, tecnicos.nombreTecnico, COUNT(*) AS 'numeroMantenimientos', SUM(activos_tecnicos.retraso) as 'numeroRetrasos' FROM activos_tecnicos INNER JOIN activos ON activos_tecnicos.IDActivo = activos.IDActivo INNER JOIN tecnicos ON activos_tecnicos.IDTecnico = tecnicos.IDTecnico GROUP BY(tecnicos.IDTecnico)";
    $result = mysqli_query($conn, $consulta);
    if ($result) {
        while ($row = $result->fetch_array()) {
            $IDTecnico = $row['IDTecnico'];
            $nombre = $row['nombreTecnico'];
            $numeroMant = $row['numeroMantenimientos'];
            $numeroRetrasos = $row['numeroRetrasos'];

?>
            <button class="mantenimientos__fecha btn_drop mantenimientos__p">
                <p class=""><?php echo $nombre ?></p>
            </button>
            <p class="mantenimientos__p"><?php echo $numeroMant ?></p>
            <p class="mantenimientos__p"><?php echo $numeroRetrasos ?></p>
        <?php
            showMant($conn, $IDTecnico);
        }
    }
}

function showMant($conn, $IDTecnico)
{
    $consulta = "SELECT activos_tecnicos.FechaUltMantenimiento, activos.nombreActivo, activos_tecnicos.Descripcion FROM activos_tecnicos INNER JOIN activos ON activos_tecnicos.IDActivo = activos.IDActivo INNER JOIN tecnicos ON activos_tecnicos.IDTecnico = tecnicos.IDTecnico  WHERE activos_tecnicos.IDTecnico=" . $IDTecnico;
    $result = mysqli_query($conn, $consulta);
    if ($result) {
        while ($row = $result->fetch_array()) {
            $fechaUlt = $row['FechaUltMantenimiento'];
            $nombreActivo = $row['nombreActivo'];
            $descripcion = $row['Descripcion'];
        ?>
            <p class="mantenimientos__p mantenimientos__fecha"><?php echo $fechaUlt ?></p>
            <p class="mantenimientos__p"><?php echo $nombreActivo ?></p>
            <p class="mantenimientos__p"><?php echo $descripcion ?></p>
<?php
        }
    }
}
?>