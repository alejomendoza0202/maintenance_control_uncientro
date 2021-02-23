<?php
//date('m/d/Y h:i:s a', time())
session_start();
date_default_timezone_set('America/Bogota'); 
if(isset($_POST["submit"])){
    
    $info=[
    "IDActivo"=>$_GET["id"],
    "IDTecnico"=>$_SESSION["userID"],
    "FechaUltMantenimiento"=>date('Y-m-d h:i:s', time()),
    "retraso"=>0,
    "Observaciones"=>$_POST["observaciones"],
    ];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    actualizarTecAct($conn,$info);
    
}
