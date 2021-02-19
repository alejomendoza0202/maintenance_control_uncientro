<?php


//Funciones para validar datos del registro

function emptyInputSignup($nombre, $email,$pwd){
    $result=null;
    if(empty($nombre) || empty($email) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result=null;
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

// Crear usuario

function crearUsuario($conn, $nombre, $email, $pwd, $habilidad) {
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
    registroHabilidad($conn, $email, $habilidad);
}

function registroHabilidad($conn, $email, $habilidad){
    $consulta = "SELECT IDTecnico FROM TECNICOS WHERE correoTecnico='".$email."'";
    $result=mysqli_query($conn, $consulta);
    $explorar = mysqli_fetch_array($result);
    $IDTecnico = $explorar["IDTecnico"];
    $sql = "INSERT INTO TECNICOS_HABILIDAD (IDTecnico, IDHabilidad) VALUES (?,?);"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registro?=error.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ii",$IDTecnico, $habilidad);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php");
    exit();
}

// Funciones para validar datos del Login

function emptyInputLogin($email,$pwd){
    $result=null;
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
        $_SESSION["permisos"]=$email["permisos"];
        $nombreCompleto = explode(" ", $_SESSION["nombre"]);
        $_SESSION["primerNombre"] = $nombreCompleto[0];
        header("location: ../home.php");
        exit();
    }
}

// Funciones para agregar activo

function emptyInputActivo($nombre,$periodo,$descripcion, $habilidad){
    $result=null;
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
    $habilidad = (int)$habilidad;
    $bit = 1;
    mysqli_stmt_bind_param($stmt,"ssiii",$nombre, $descripcion, $periodo, $habilidad, $bit);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../agregar_activo.php?error=none");
    exit();
}

function mantenimientoHecho($conn,$id){
    $sql = "UPDATE activos SET mantenimiento=0 WHERE IDActivo= ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registroMantenimiento.php?error=stmtFailedman");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    exit();

}

function actualizarTecAct($conn,$info){
    $sql = "INSERT INTO activos_tecnicos (IDActivo, IDTecnico, FechaUltMantenimiento, retraso, Descripcion, Observaciones) VALUES (?,?,?,?,?,?) ;"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registroMantenimiento.php?error=stmtFailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt,"iisiss",$info["IDActivo"],$info["IDTecnico"], $info["FechaUltMantenimiento"], $info["retraso"], $info["Descripcion"],$info["Observaciones"]);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../home.php?IDTec=".$info["IDTecnico"]."&Fec=".$info["FechaUltMantenimiento"]);
    exit();
}
