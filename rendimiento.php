<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/rendimiento.css">
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
                <div class="filtros__menu-rendimiento">
                    <label for="" class="filtros__label-titulo"> Filtros </label>
                    <div class="filtros__maquina">
                        <label for="" class="filtros__label"> Ordenar por</label>
                        <select name="" id="" class="filtros__select">
                            <option value="">Mejor desempeño</option>
                            <option value="">Peor desempeño</option>
                            <option value="">Numero de mantenimientos</option>
                        </select>
                    </div>
                    <a href = "#" class="filtros__boton">Filtrar</a>
                </div>
            </div>
            <div class="rendimiento">
                <h2 class="rendimiento__h2">Estos son los empleados y su rendimiento en el mes de diciembre.</h2>
                <p class="mantenimientos__titulos">Nombre</p>
                <p class="mantenimientos__titulos">Mantenimientos realizados</p>
                <p class="mantenimientos__titulos">Retrasos en mantenimientos</p>
                <p class="mantenimientos__titulos">Horas de trabajo</p>
                <?php
                    include_once("includes/rendimiento.inc.php");
                ?>
            </div>
        </div>
    </div>
</body>
</html>