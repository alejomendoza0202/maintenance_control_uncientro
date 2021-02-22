<?php

$inc = include("includes/dbh.inc.php");
if($inc){
    $consulta = "SELECT activos.nombreActivo, activos.descripcionActivo, activos.frecMantActivo, activos.mantenimiento, activos.IDActivo FROM tecnicos_habilidad INNER JOIN activos ON tecnicos_habilidad.IDHabilidad = activos.IDHabilidad
    WHERE tecnicos_habilidad.IDTecnico =".$_SESSION["userID"];
    $result = mysqli_query($conn, $consulta);
    if($result){
        while($row = $result->fetch_array()){
            $search = "SELECT siguienteFecha FROM activos_tecnicos WHERE ultima=1 AND IDActivo=".$row["IDActivo"];
            $resultado = mysqli_query($conn, $search);
            $row2 = $resultado->fetch_array();
            $maxMantenimiento = $row2["siguienteFecha"];
            $maxMantenimiento = strtotime($maxMantenimiento);
            $maxMantenimiento = date('d-m', $maxMantenimiento);
            $nombreActivo = $row['nombreActivo'];
            $descripcionActivo = $row['descripcionActivo'];
            $frecManActivo = $row['frecMantActivo'];
            $mantenimiento = $row['mantenimiento'];
            $idActivo=$row['IDActivo'];  
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