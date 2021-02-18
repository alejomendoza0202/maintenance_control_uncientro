<?php



if(isset($_POST["submit"])){
    
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    $habilidad = $_POST["habilidad"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($nombre, $email,$pwd) !== false){
        header("location: ../registro.php?error=emptyInput");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../registro.php?error=invalidEmail");
        exit();
    }
    if(emailExists($conn, $email) !== false){
        header("location: ../registro.php?error=emailExists");
        exit();
    }

    crearUsuario($conn, $nombre, $email, $pwd, $habilidad);


}
else{
    header("location: ../index.php");
}