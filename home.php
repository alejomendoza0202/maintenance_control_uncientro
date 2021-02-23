<?php
///////////////////////// VARIABLES DE CONSULTA ///////////////////////////////
date_default_timezone_set('America/Bogota');
$actualDate2 = date('Y-m-d', time());
?>


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
            <?php
            $prioridad = "ORDER BY activos.sigMantenimiento asc";
            $date = "";
            if (isset($_POST['buscar'])) {
                $orden = $_POST['orden'];
                if (empty($_POST['xparahoy'])) {
                    $prioridad = "ORDER BY activos.sigMantenimiento " . $orden;
                } else if (empty($_POST['orden'])) {
                    $date = "AND activos.sigMantenimiento  = '" . $actualDate2 . "'";
                }
            }
            ?>
            <div class="cuerpo">
                <div class="filtros">
                    <form method="POST">
                        <input type="text" name="xnombre" class="filtros__input" placeholder="Buscar">
                        <div class="filtros__menu">
                            <label for="" class="filtros__label-titulo"> Filtros </label>
                            <div class="filtros__para-hoy">
                                <label for="" class="filtros__label"> Para hoy</label>
                                <input type="checkbox" value="<?php echo $actualDate2 ?>" name="xparahoy" id="" class="filtros__checkbox">
                            </div>
                            <div class="filtros__prioridad">
                                <label for="" class="filtros__label"> Prioridad</label>
                                <select name="orden" id="orden" class="filtros__select">
                                    <option value="">Seleccione la prioridad</option>
                                    <option value="asc">Con más prioridad</option>
                                    <option value="desc">Con menos prioridad</option>
                                </select>
                            </div>
                            <button name="buscar" type="submit" class="filtros__boton"> Filtrar</button>
                        </div>
                    </form>
                </div>
                <div class="mantenimientos">
                    <h2 class="mantenimientos__h2">Estos son los activos que necesitan mantenimiento dentro de los siguientes 7 días.</h2>
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
                    <?php
                    date_default_timezone_set('America/Bogota');
                    $fechaFin = date("Y-m-d");
                    $fechaInicio = date("Y-m-d", strtotime($fechaFin . "- 7 days"));
                    $fechas = "WHERE FechaUltMantenimiento > '$fechaInicio'";
                    $fechas2 = "AND activos_tecnicos.FechaUltMantenimiento > '$fechaInicio'";
                    $fechas3 = "WHERE activos_tecnicos.FechaUltMantenimiento > '$fechaInicio'";
                    $prioridad = "ORDER BY activos.sigMantenimiento asc";
                    $date = "";
                    if (isset($_POST['filtrarFecha'])) {
                        $fechaInicio = $_POST['fechaInicio'];
                        $fechaFin = $_POST['fechaFin'];
                        $fechas = "WHERE FechaUltMantenimiento BETWEEN '$fechaInicio' AND '$fechaFin'";
                        $fechas2 = "AND activos_tecnicos.FechaUltMantenimiento BETWEEN '$fechaInicio' AND '$fechaFin'";
                        $fechas3 = "WHERE activos_tecnicos.FechaUltMantenimiento BETWEEN '$fechaInicio' AND '$fechaFin'";
                    }
                    ?>
                    <div class="cuerpo">
                        <div class="filtros">
                            <form method="POST">
                                <div class="filtros__menu-rendimiento">
                                    <label for="" class="filtros__label-titulo"> Filtrar por fechas </label>
                                    <div class="filtros__maquina">
                                        <label for="" class="filtros__label"> Desde:</label>
                                        <input type="date" id="fechaInicio" name="fechaInicio" max=<?php echo $actualDate2 ?> required>
                                    </div>
                                    <div class="filtros__maquina">
                                        <label for="" class="filtros__label"> Hasta:</label>
                                        <input type="date" id="fechaFin" name="fechaFin" max=<?php echo $actualDate2 ?> required>
                                    </div>
                                    <button name="filtrarFecha" type="submit" class="filtros__boton"> Filtrar</button>
                                </div>
                            </form>
                        </div>
                        <div class="rendimiento">
                            <div class="titulo__informe">
                                <p class="p__titulo__informe">Informe desde <?php echo $fechaInicio ?> hasta <?php echo $fechaFin?> </p>
                            </div>
                            <div class="informes_numeros">
                                <div class="numero_mantenimientos">
                                    <p>Número de mantenimientos</p><br>
                                    <?php
                                    $inc = include("includes/dbh.inc.php");
                                    if ($inc) {
                                        $consulta = "SELECT count(*) AS numMantenimientos FROM activos_tecnicos $fechas";
                                        $result = mysqli_query($conn, $consulta);
                                        $row = $result->fetch_array();
                                    ?>
                                        <p><?php echo $row['numMantenimientos'] ?></p>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="numero_mantenimientos">
                                    <p>Número de activos</p><br>
                                    <?php
                                    $inc = include("includes/dbh.inc.php");
                                    if ($inc) {
                                        $consulta = "SELECT count(*) AS numActivos FROM activos";
                                        $result = mysqli_query($conn, $consulta);
                                        $row = $result->fetch_array();
                                    ?>
                                        <p><?php echo $row['numActivos'] ?></p>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="numero_mantenimientos">
                                    <p>Número de técnicos</p><br>
                                    <?php
                                    $inc = include("includes/dbh.inc.php");
                                    if ($inc) {
                                        $consulta = "SELECT count(*) AS numTecnicos FROM tecnicos";
                                        $result = mysqli_query($conn, $consulta);
                                        $row = $result->fetch_array();
                                    ?>
                                        <p><?php echo $row['numTecnicos'] - 1 ?></p>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
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
                            <h2 class="rendimiento__h2">Informe de empleados.</h2>
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