<?php

session_start();

// TEMPORAL ======================================
$_SESSION['logged'] = true;
$_SESSION['user_name'] = "1011397353";
$_SESSION['user_nick'] = "Prueba";
header("Location: ../inicio");
exit();
// TEMPORAL ======================================  

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    exit();
}

if (!isset($_POST['accion'])) {
    exit();    
}

if ($_POST['accion'] == "login") {
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        exit();
    }
    // Validar el usuario y contraseña con la base de datos

} else if ($_POST['accion'] == "register") {

} else {
    exit();
}
//require_once '../utils/connect.php';
//$con = new conexion_m();
// !isset($_POST['username'])
