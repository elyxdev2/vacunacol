<?php
session_start();
if (!isset($_SESSION["logged"])) {
    header("Location: ../auth/login");
    exit();
} else {
    if ($_SESSION["logged"] != true) {
        header("Location: ../auth/login");
        exit(); 
    }
}
// Not isset id
if (!isset($_GET['id'])) {
    header("Location: index");
    exit();
}
// Empty id
if (empty($_GET['id'])) {
    header("Location: index");
    exit();
}

// Obtiene la vacuna
require_once '../utils/connect.php';
$db = new conexion_m();
$vacunaid = $_GET['id'];
$sql = "SELECT * FROM vacunas WHERE id = '$vacunaid'";
$result = $db->query($sql);

// Si la vacuna no existe
if (mysqli_num_rows($result) < 1) {
    header("Location: index");
    exit();
}
$vacuna = mysqli_fetch_assoc($result);
// Si la vacuna no le pertenece
if ($vacuna['id_usuario'] != $_SESSION['user_id']) {
    header("Location: index");
    exit();
}

// DELETE FROM vacunas WHERE `vacunas`.`id` = 6
$sql = "DELETE FROM vacunas WHERE vacunas.id = $vacunaid";
$db->query($sql);

header("Location: index");
exit();