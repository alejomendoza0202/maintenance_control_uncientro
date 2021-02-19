<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/agregar_activo.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Añadir activo</title>
</head>
<body>
<div class="container">
    <?php
    include('partials/navbar.php') 
    ?>
    <div class="cuerpo">
        <div class="container__form">
            <form action="includes/agregar_activo.inc.php" method="post" class="agregar-activo__formulario">
                <div class="container-grid">
                    <h2 class="agregar-activo__h2">Añadir activo</h2>
                    <div class="nombre-activo">
                        <p class="container-nombre__p">Nombre</p>
                        <input name="nombre" type="text" class="container__input">
                    </div>
                    <div class="periodo-activo">
                        <p class="container-mant__p">Período de mantenimiento (días) </p>
                        <input name="periodo" type="number" class="container__input">
                    </div>
                    <div class="descripcion-activo">
                        <p class="container-desc__p">Descripción </p>
                        <input name="descripcion" type="text" class="container__input container__descripcion">
                    </div>
                    <div class="container-habilidades">
                    <p class="habilidades__p">Habilidades que se deben tener para realizar el mantenimiento</p>
                        <select name="habilidad"  class="habilidades">
                            <option class="habilidades" value="1">Mecánica básica</option>
                            <option class="habilidades" value="2">Soldadura</option>
                            <option class="habilidades" value="3">Plomería</option>
                            <option class="habilidades" value="4">Manejo eléctrico</option>
                            <option class="habilidades" value="5">Manejo electrónico</option>
                        </select>
                    </div>
                    <div class="activos-botones">
                        <a href="home.php" class="añadir-boton">Cancelar</a>
                        <input type="submit" name="submit" value="Añadir" class="añadir-boton">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>