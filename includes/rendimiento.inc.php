<?php

$inc = include("includes/dbh.inc.php");
if($inc){
    $consulta = "SELECT IDTecnico, nombreTecnico FROM TECNICOS";
    $result = mysqli_query($conn, $consulta);
    $i=-1;
    if($result){
        while($row = $result->fetch_array()){
            $i=$i+1;
            $IDTecnico = $row['IDTecnico'];
            $consultaLlenar ="SELECT activos.nombreActivo, activos.descripcionActivo, activos_tecnicos.FechaUltMantenimiento, activos_tecnicos.retraso FROM activos_tecnicos INNER JOIN activos ON activos_tecnicos.IDActivo = activos.IDActivo INNER JOIN tecnicos ON activos_tecnicos.IDTecnico = tecnicos.IDTecnico WHERE activos_tecnicos.IDTecnico=".$IDTecnico;
            $resultado = mysqli_query($conn, $consultaLlenar);
            $cantidad = $resultado->num_rows;
            $nombre = $row['nombreTecnico'];
            ?>
                <button class="mantenimientos__fecha btn_drop mantenimientos__p"><p class=""><?php echo $nombre ?></p></button>
                <p class="mantenimientos__p"><?php echo $cantidad?></p>
                <p class="mantenimientos__p"><?php echo $IDTecnico?></p>
                <p class="mantenimientos__p">160</p>
            <?php
            }
        }
    }
?>