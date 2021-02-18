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
            <div class="mantenimientos">
            <h2 class="mantenimientos__h2">Estos son los activos que necesitan mantenimiento</h2>
            <p class="mantenimientos__titulos">Fecha límite</p>
            <p class="mantenimientos__titulos">Prioridad</p>
            <p class="mantenimientos__titulos">Activo</p>
            <p class="mantenimientos__titulos">Descripción</p>
            <p class="mantenimientos__p mantenimientos__fecha">HOY</p>
            <p class="mantenimientos__p" id="example">Alta</p>
            <p class="mantenimientos__p">Ascensor</p>
            <p class="mantenimientos__p">Está mal</p>
            <a href="#" class="mantenimientos__p mantenimientos__a">Realizar</a>
            <div class="container__mant-realizado">
                <p class="">Fecha límite</p>
                <p class="">Prioridad</p>
                <p class="">Activo</p>
                <p class="">Descripción</p>
                <p class=" ">HOY</p>
                <p class="" id="example">Alta</p>
                <p class="">Ascensor</p>
                <p class="">Está mal</p>
                <a href="#" class=" ">Realizar</a>
            </div>
            <button onclick="show_hide()">Pulsa</button>
            <script src="js/showHide.js"></script>
            </div>
        </div>
    </div>
</body>
</html>