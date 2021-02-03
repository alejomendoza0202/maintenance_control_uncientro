<?php 
    $serverName = 'localhost';
    $dBusername = 'root';
    $dBpassword = '';
    $dBName = 'mant_db';

    $conn = mysqli_connect($serverName, $dBusername, $dBpassword, $dBName);
    if(!$conn) {
        die("La conexión ha fallado" . mysqli_connect_error());
    }