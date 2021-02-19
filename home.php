<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    
</head>
<body>
    <div class="container">
    <?php
    include('partials/navbar.php') 
    ?>
        <div class="cuerpo">
            <div class="filtros">
                <input type="text" name="" class="filtros__input" placeholder="Buscar">
                <div class="filtros__menu">
                    <label for="" class="filtros__label-titulo"> Filtros </label>
                    <div class="filtros__para-hoy">
                        <label for="" class="filtros__label"> Para hoy</label>
                        <input type="checkbox" name="" id="" class="filtros__checkbox">
                    </div>
                    <div class="filtros__maquina">
                        <label for="" class="filtros__label"> Máquina</label>
                        <select name="" id="" class="filtros__select">
                            <option value="">Ascensor</option>
                            <option value="">Escaleras</option>
                        </select>
                    </div>
                    <div class="filtros__prioridad">
                        <label for="" class="filtros__label"> Prioridad</label>
                        <select name="" id="" class="filtros__select">
                            <option value="">Alta</option>
                            <option value="">Media</option>
                            <option value="">Baja</option>
                        </select>
                    </div>
                    <a href = "#" class="filtros__boton">Filtrar</a>
                </div>
            </div>
            <?php
                if($_SESSION["permisos"]==0){
                    echo('<div class="mantenimientos">
                    <h2 class="mantenimientos__h2">Estos son los activos que necesitan mantenimiento</h2>
                    <p class="mantenimientos__titulos">Fecha límite</p>
                    <p class="mantenimientos__titulos">Prioridad</p>
                    <p class="mantenimientos__titulos">Activo</p>
                    <p class="mantenimientos__titulos">Descripción</p>');
                    include_once("includes/home.inc.php");
                    echo('</div>');
                }
            ?>
            
            
        </div>
    </div>
</body>
</html>