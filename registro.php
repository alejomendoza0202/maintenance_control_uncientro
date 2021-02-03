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
            <form action="includes/registro.inc.php" method="post" class="agregar-activo__formulario">
                <div class="container-grid">
                    <h2 class="agregar-activo__h2">Registro de usuario</h2>
                    <div class="nombre-activo">
                        <p class="container-nombre__p">Nombre completo</p>
                        <input name="name" type="text" class="container__input">
                    </div>
                    <div class="periodo-activo">
                        <p class="container-mant__p">Correo </p>
                        <input name="email" type="email" class="container__input">
                    </div>
                    <div class="periodo-activo">
                        <p class="container-mant__p">Contraseña </p>
                        <input name="password" type="password" class="container__input">
                    </div>
                    <div class="periodo-activo">
                        <p class="habilidades__p">Habilidades que posee el trabajador</p>
                        <select name="habilidad"  class="container__input">
                            <option class="habilidades" value="1">Mecánica básica</option>
                            <option class="habilidades" value="2">Soldadura</option>
                            <option class="habilidades" value="3">Plomería</option>
                            <option class="habilidades" value="4">Manejo eléctrico</option>
                            <option class="habilidades" value="5">Manejo electrónico</option>
                        </select>
                    </div>
                    <div class="container-habilidades">
                    </div>
                    <div class="activos-botones">
                        <input type="submit" name="submit" value="Registrarse" class="añadir-boton">
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>