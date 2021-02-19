<?php
    session_start();
?>
<nav class="navbar">
    <ul class="navbar__ul">
        <div class="navbar__container">
            <div class="container__user-functions">
            <a href='index.php' class='navbar__a'><img class='navbar__img' src='img/unicentro_logo.png' alt=''></a>
            <?php
                if(isset($_SESSION["correo"]) && $_SESSION["permisos"]==1){
                    echo "<a href = 'agregar_activo.php' class='navbar__boton'>Añadir activo</a>";
                }
            ?>
            </div>
            <div class="container__user-botons">
            <?php
                if(isset($_SESSION["correo"])){
                    echo "<li class='navbar__li'><a href='#' class='navbar__a'>Hola, ".$_SESSION["primerNombre"]."</a></li>";
                    echo "<a href = 'includes/logout.inc.php' class='navbar__boton'>Salir</a>";
                }
                else{
                    echo "<a href = 'registro.php' class='navbar__boton'>Registro</a>";
                }
            ?>
            </div>
        </div>
    </ul>
</nav>