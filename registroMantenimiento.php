<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registroMantenimiento.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Registrar Mantenimiento</title>
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
                    <h2 class="agregar-activo__h2">Registrar matenimiento de escaleras eléctricas primer piso</h2>
                    <div class="nombre-activo">
                        <p class="container-nombre__p">Descripción</p>
                        <select name="habilidad"  class="container__input">
                            <option class="habilidades" value="1">Mecánica básica</option>
                            <option class="habilidades" value="2">Soldadura</option>
                            <option class="habilidades" value="3">Plomería</option>
                            <option class="habilidades" value="4">Manejo eléctrico</option>
                            <option class="habilidades" value="5">Manejo electrónico</option>
                        </select>
                        <p class="habilidades__p">Añadir imagen</p>
                    </div>
                    <div class="periodo-activo">
                        <p class="container-mant__p">Observaciones (opcional)</p>
                        <input name="email" type="email" class="container__input">
                    </div>
                    
                        
                    
                    
                        
                    
                    
                        
                    

                </div>
                <div class="drop-zone">
                <h2 class="agregar-activo__h2">Suba o arrastre las imagenes</h2>
                <button class="subir-archivo">
                    Subir archivo
                </button>
                <input type="file" style="display: none;" id="image" >    
            </div>
                
                        
                    
                    
                    
                    
                    
                    
                    
                    <div class="activos-botones">
                        <div class="activos-botones">
                            <input type="submit" name="submit" value="Cancelar" class="añadir-boton">
                            <input type="submit" name="submit" value="Registrarse" class="añadir-boton">
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>