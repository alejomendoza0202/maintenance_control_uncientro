<?php

$inc = include("includes/dbh.inc.php");
if ($inc) {
    date_default_timezone_set('America/Bogota'); 
    $fechaActual = date("Y-m-d");
    $sigSemana = date("Y-m-d", strtotime($fechaActual."+ 7 days"));
    $fechaSig = "AND activos.sigMantenimiento < '$sigSemana'";
    $IDUser = $_SESSION["userID"];
    $consulta = "SELECT activos.nombreActivo, activos.descripcionActivo, activos.frecMantActivo, activos.mantenimiento, activos.IDActivo, activos.sigMantenimiento FROM tecnicos_habilidad INNER JOIN activos ON tecnicos_habilidad.IDHabilidad = activos.IDHabilidad
    WHERE tecnicos_habilidad.IDTecnico ='$IDUser' $fechaSig $prioridad $date";
    $result = mysqli_query($conn, $consulta);
    if ($result) {
        while ($row = $result->fetch_array()) {
            
            // Consulta para obtener fecha máxima
            $maxMantenimiento = $row["sigMantenimiento"];
            $maxMantenimiento = strtotime($maxMantenimiento);
            $maxMantenimiento = date('Y-m-d', $maxMantenimiento);

            // Obtener resto de valores
            $nombreActivo = $row['nombreActivo'];
            $descripcionActivo = $row['descripcionActivo'];
            $frecManActivo = $row['frecMantActivo'];
            $mantenimiento = $row['mantenimiento'];
            $idActivo = $row['IDActivo'];

            // Calcular prioridad
            $prioridad = "";
            $actualDate = date('Y-m-d', time());
            $date1 = new DateTime($actualDate);
            $date2 = new DateTime($maxMantenimiento);
            $diferencia = $date1->diff($date2);
            $diferencia = $diferencia->days;
            if ($diferencia >=5) {
                $prioridad = "Baja";
            }
            if($diferencia <= 4){
                $prioridad = "Media";
            }
            if($diferencia <= 2){
                $prioridad = "Alta";
            }


            if ($mantenimiento == 1) {
?>
                <p class="mantenimientos__p mantenimientos__fecha"><?php echo $maxMantenimiento . ' (' . $diferencia . ' días)' ?></p>
                <p class="mantenimientos__p"><?php echo $prioridad ?> </p>
                <p class="mantenimientos__p"><?php echo $nombreActivo ?></p>
                <p class="mantenimientos__p"><?php echo $descripcionActivo ?> </p>
                <a href="<?php echo ('registroMantenimiento.php?id=' . $idActivo) ?>" class="mantenimientos__p mantenimientos__a">Completar</a>
<?php
            }
        }
    }
}
?>