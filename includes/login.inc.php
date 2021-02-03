<?php

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    if(emptyInputLogin($email,$pwd) !== false){
        header("location: ../index.php?error=emptyInput");
        exit();
    }

    loginUser($conn, $email, $pwd);
}
else{
    header("location: ../index.php");
    exit();
}