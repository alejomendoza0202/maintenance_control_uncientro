<?php

if(isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $periodo = $_POST["periodo"];
    $descripcion = $_POST["descripcion"];
    $habilidad = $_POST["habilidad"];


    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    if(emptyInputActivo($nombre,$periodo,$descripcion, $habilidad) !== false){
        header("location: ../agregar_activo.php?error=emptyInput");
        exit();
    }

    addActivo($conn, $nombre, $periodo,$descripcion, $habilidad);
}
else{
    header("location: ../index.php");
    exit();
}