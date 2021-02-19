<?php
if (isset($_GET["id"])) {
    $inc = include("includes/dbh.inc.php");
    if ($inc) {
        $consulta = "SELECT nombreActivo FROM activos WHERE IDActivo =" . $_GET["id"];
        $result = mysqli_query($conn, $consulta);
        if ($result) {
            $activo = $result->fetch_assoc();
            $nombre = $activo["nombreActivo"];
            $id = $_GET["id"];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registroMantenimiento.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Registro Mantenimiento</title>
    <script src="js/registroMantenimiento.js"></script>
</head>

<body>
    <div class="container">
        <?php
        include('partials/navbar.php')
        ?>
        <div class="cuerpo">
            <div class="container__form">
                <form action="includes/registroMantenimiento.inc.php?id=<?php echo($id) ?>" method="post" class="agregar-activo__formulario">
                    <h2 class="agregar-activo__h2">Registrar mantenimiento de <?php echo $nombre ?></h2>
                    <div class="container-grid">

                        <div class="nombre-activo">
                            <p class="habilidades__p">Descripción</p>
                            <select name="descripcion" class="container__input">
                                <option class="habilidades" value="Finalizado">Finalizado</option>
                            </select>
                            <p class="add-image-text">Añadir imagen </p>
                        </div>
                        <div class="periodo-activo">
                            <p class="container-mant__p">Observaciones (opcional) </p>
                            <input name="observaciones" type="text" class="container__input">
                        </div>

                    </div>
                    <div class="drop-zone">
                        <h2 class="agregar-activo__h2">Suba o arrastre las imagenes</h2>
                        <input type="file" id="file" style="display:none;" />
                        <button id="button" name="button" type="button" value="Upload" class="subir-archivo" onclick="thisFileUpload();">Subir Archivo</button>


                    </div>
                    <div class="activos-botones">
                        <input type="button" name="submit" value="Cancelar" class="añadir-boton" onClick="document.location.href='home.php'">
                        <input type="submit" name="submit" value="Registrar" class="añadir-boton">

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
</div>
</body>

</html>