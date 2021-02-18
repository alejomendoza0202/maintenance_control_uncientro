<?php


//Funciones para validar datos del registro

function emptyInputSignup($nombre, $email,$pwd){
    $result;
    if(empty($nombre) || empty($email) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM TECNICOS WHERE correoTecnico = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registro.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    } else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function crearUsuario($conn, $nombre, $email, $pwd) {
    $sql = "INSERT INTO TECNICOS (nombreTecnico, correoTecnico, pwdTecnico) VALUES (?,?,?) ;"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registro.php?error=stmtFailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"sss",$nombre, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php");
    exit();
}


// Funciones para validar datos del Login

function emptyInputLogin($email,$pwd){
    $result;
    if(empty($email) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $pwd){
    $email = emailExists($conn, $email);
    if($email === false){
        header("location: ../index.php?error=wrongEmail");
        exit();
    }

    $pwdHashed = $email["pwdTecnico"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../index.php?error=wrongLogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userID"] = $email["IDTecnico"];
        $_SESSION["correo"] = $email["correoTecnico"];
        $_SESSION["nombre"] = $email["nombreTecnico"];
        $nombreCompleto = explode(" ", $_SESSION["nombre"]);
        $_SESSION["primerNombre"] = $nombreCompleto[0];
        header("location: ../home.php");
        exit();
    }
}

// Funciones para agregar activo

function emptyInputActivo($nombre,$periodo,$descripcion, $habilidad){
    $result;
    if(empty($nombre) || empty($periodo) || empty($descripcion) || empty($habilidad)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function addActivo($conn, $nombre, $periodo,$descripcion, $habilidad){
    $sql = "INSERT INTO ACTIVOS (nombreActivo, descripcionActivo, frecMantActivo, IDHabilidad, mantenimiento) VALUES (?,?,?,?,?) ;"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../agregar_activo.php?error=stmtFailed");
        exit();
    }
    $periodo = (int)$periodo;
    $habilida = (int)$habilidad;
    $bit = 1;
    mysqli_stmt_bind_param($stmt,"ssiii",$nombre, $descripcion, $periodo, $habilidad, $bit);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../agregar_activo.php?error=none");
    exit();
}