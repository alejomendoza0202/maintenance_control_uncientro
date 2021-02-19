<?php

$inc = include("includes/dbh.inc.php");
if($inc){
    $consulta = "SELECT activos.nombreActivo, activos.descripcionActivo, activos.frecMantActivo, activos.mantenimiento, activos.IDActivo FROM tecnicos_habilidad INNER JOIN activos ON tecnicos_habilidad.IDHabilidad = activos.IDHabilidad
    WHERE tecnicos_habilidad.IDTecnico =".$_SESSION["userID"];
    $result = mysqli_query($conn, $consulta);
    if($result){
        while($row = $result->fetch_array()){
            $fechaActual = date('d-m-Y');
            $nombreActivo = $row['nombreActivo'];
            $descripcionActivo = $row['descripcionActivo'];
            $frecManActivo = $row['frecMantActivo'];
            $mantenimiento = $row['mantenimiento'];
            $idActivo=$row['IDActivo'];
            $maxMantenimiento = strtotime('+'.$frecManActivo.' day', strtotime($fechaActual));    
            $maxMantenimiento = date('d-m-Y', $maxMantenimiento);
            if($mantenimiento==1){                        
            ?> 
                <p class="mantenimientos__p mantenimientos__fecha"><?php echo $maxMantenimiento?></p>
                <p class="mantenimientos__p">Alta</p>
                <p class="mantenimientos__p"><?php echo $nombreActivo?></p>
                <p class="mantenimientos__p"><?php echo $descripcionActivo?> </p>
                <a href="<?php echo('registroMantenimiento.php?id='.$idActivo) ?>" class="mantenimientos__p mantenimientos__a">Realizar</a>
            <?php
            }
        }
        
    }
}
?>