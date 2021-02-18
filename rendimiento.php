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
        <nav class="navbar">
            <ul class="navbar__ul">
                <div class="navbar__container">
                    <li class="navbar__li"><a href="#" class="navbar__a"><img class="navbar__img" src="img/unicentro_logo.png" alt=""></a></li>
                    <div class="user-container">
                        <a href="#" class="navbar__a">Hola, Santiago</a>
                        <a href = "index.html" class="filtros__boton user-container__boton">Salir</a>
                    </div>
                </div>
            </ul>
        </nav>
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
                <button class="mantenimientos__fecha btn_drop" onclick="show_hide()"><p class="mantenimientos__p">Mendoza Lopez Fredy Alejandro</p></button>
                <p class="mantenimientos__p">15</p>
                <p class="mantenimientos__p">1</p>
                <p class="mantenimientos__p">160 </p>
                <div class="container__drop" id="container_drop">
                   <p class="mantenimientos__p">Fecha</p>
                    <p class="mantenimientos__p">Nombre</p>
                    <p class="mantenimientos__p">Retraso</p>
                    <p class="mantenimientos__p">A </p>
                </div>
                
            </div>
            <script src='js/showHide.js'></script>
        </div>
    </div>
</body>
</html>