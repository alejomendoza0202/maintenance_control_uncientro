<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <div class="container">
        <?php
        include('partials/navbar.php');
        if(isset($_SESSION["userID"])){
            header("location: home.php");
        }
        
        ?>
        <div class="cuerpo">
            <div class="login">
                <div class="login__container-h2">
                    <h2 class="login__h2">Inicio de sesión</h2>
                </div>
                <form action="includes/login.inc.php" method="post" class="login__formulario">
                    <div class="login__flex">
                        <h3 class="login__h3">Correo electrónico</h3>
                        <input name="email" type="email" placeholder="Ingrese el correo electrónico" class="login__input"> 
                        <h3 class="login__h3">Contraseña</h3>
                        <input name="password" type="password" placeholder="Ingrese la contraseña" class="login__input"> 
                        <input type="submit" name="submit" value="Ingresar" class="login__boton">
                        <div class="container__a">
                            <a href = "#" class="login__a">¿Olvidaste tu contraseña?</a>
                        </div>  
                    </div>
                </form>
                <div class ="container_error">
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyInput"){
                                echo "<p class='container_error__p'> Olvidaste llenar algún campo </p>";
                            }
                            else if($_GET["error"] == "wrongLogin"){
                                echo "<p class='container_error__p'> Los datos son incorrectos </p>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>