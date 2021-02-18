<?php

$inc = include("includes/dbh.inc.php");
if($inc){
    $consulta = "SELECT activos.nombreActivo, activos.descripcionActivo, activos.frecMantActivo, activos.mantenimiento FROM tecnicos_habilidad INNER JOIN activos ON tecnicos_habilidad.IDHabilidad = activos.IDHabilidad
    WHERE tecnicos_habilidad.IDTecnico =".$_SESSION["userID"];
    $result = mysqli_query($conn, $consulta);
    $i=-1;
    if($result){
        while($row = $result->fetch_array()){
            $i=$i+1;
            $fechaActual = date('d-m-Y');
            $nombreActivo = $row['nombreActivo'];
            $descripcionActivo = $row['descripcionActivo'];
            $frecManActivo = $row['frecMantActivo'];
            $mantenimiento = $row['mantenimiento'];
            $maxMantenimiento = strtotime('+'.$frecManActivo.' day', strtotime($fechaActual));    
            $maxMantenimiento = date('d-m-Y', $maxMantenimiento);
            if($mantenimiento==1){                        
            ?> 
                <button class="mantenimientos__fecha btn_drop" onclick="show_hide(<?php echo $i ?>)"><p class="mantenimientos__p">Mendoza Lopez Fredy Alejandro</p></button>
                <p class="mantenimientos__p">15</p>
                <p class="mantenimientos__p">1</p>
                <p class="mantenimientos__p">160 </p>
                <div class='container__drop' id='container_drop<?php echo $i?>'>
                   <p class="mantenimientos__p">Fecha</p>
                    <p class="mantenimientos__p"><?php echo $i ?></p>
                    <p class="mantenimientos__p">Retraso</p>
                    <p class="mantenimientos__p">A </p>
                </div>
            <?php
            }
        }
        
    }
}
?>