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
    <!--<script src='libraries\jquery-3.5.1.min.js'></script>
    <script src='libraries\plotly-latest.min.js'></script>-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/rendimiento.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>

<body>
    <div class="container">
        <?php
        include('partials/navbar.php')
        ?>
        <?php
        if ($_SESSION["permisos"] == 0) {
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
                        <a href="#" class="filtros__boton">Filtrar</a>
                    </div>
                </div>
                <div class="mantenimientos">
                    <h2 class="mantenimientos__h2">Estos son los activos que necesitan mantenimiento</h2>
                    <p class="mantenimientos__titulos">Fecha límite</p>
                    <p class="mantenimientos__titulos">Prioridad</p>
                    <p class="mantenimientos__titulos">Activo</p>
                    <p class="mantenimientos__titulos">Descripción</p>
                <?php
                include_once("includes/home.inc.php");
                echo ('</div>');
            } else {
                $monthNum = date('n');
                switch ($monthNum) {
                    case 1:
                        $monthNameSpanish = "enero";
                        break;

                    case 2:
                        $monthNameSpanish = "febrero";
                        break;

                    case 3:
                        $monthNameSpanish = "marzo";
                        break;

                    case 4:
                        $monthNameSpanish = "abril";
                        break;

                    case 5:
                        $monthNameSpanish = "mayo";
                        break;

                    case 6:
                        $monthNameSpanish = "junio";
                        break;

                    case 7:
                        $monthNameSpanish = "julio";
                        break;

                    case 8:
                        $monthNameSpanish = "agosto";
                        break;

                    case 9:
                        $monthNameSpanish = "septiembre";
                        break;

                    case 10:
                        $monthNameSpanish = "octubre";
                        break;

                    case 11:
                        $monthNameSpanish = "noviembre";
                        break;

                    case 12:
                        $monthNameSpanish = "diciembre";
                        break;
                }
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
                                <a href="#" class="filtros__boton">Filtrar</a>
                            </div>
                        </div>
                        <div class="rendimiento">
                            <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Mantenimiento', 'Mantenimientos'],
                                        <?php
                                        include_once("graficas/numMantenimientos.php");
                                        ?>
                                    ]);

                                    var options = {
                                        title: 'Número de mantenimientos',
                                        hAxis: {
                                            title: 'Fecha',
                                            titleTextStyle: {
                                                color: '#333'
                                            }
                                        },
                                        vAxis: {
                                            minValue: 0
                                        }
                                    };

                                    var chart = new google.visualization.AreaChart(document.getElementById('graficos'));
                                    chart.draw(data, options);
                                }
                            </script>
                            <div class="graficos" id="graficos"></div>
                            <h2 class="rendimiento__h2">Estos son los empleados y su rendimiento en el mes de <?php echo $monthNameSpanish ?>.</h2>
                            <p class="mantenimientos__titulos">Nombre</p>
                            <p class="mantenimientos__titulos">Mantenimientos realizados</p>
                            <p class="mantenimientos__titulos">Retrasos en mantenimientos</p>

                        <?php
                        include_once("includes/rendimiento.inc.php");
                        echo ('</div>');
                    }
                        ?>


                        </div>
                    </div>
</body>

</html>