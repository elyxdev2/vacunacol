<?php
// Evitar requests get
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: index");
    exit();
}

if (!isset($_POST['accion'])) {
    // No hay acción a realizar
    header("Location: index");
    exit();    
}

// Si es post y hay acción a realizar se importa la conexión a la base de datos
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

include '../utils/connect.php';

if ($_POST['accion'] == "crear") {
 /* 
nombre_vacuna
entidad_oficial
dosis_necesarias
dosis_aplicadas
fecha
lugar
descripcion
 */
    if (!isset($_POST['nombre_vacuna']) || !isset($_POST['entidad_oficial']) || !isset($_POST['dosis_necesarias']) || !isset($_POST['dosis_aplicadas']) || !isset($_POST['fecha']) || !isset($_POST['lugar'])) {
        echo "Error isset";
        exit();
    }
    if (empty($_POST['nombre_vacuna']) || empty($_POST['fecha']) || empty($_POST['lugar'])) {
        echo "Error empty";
        exit();
    }

    $nombre_vacuna = $_POST['nombre_vacuna'];
    $entidad_oficial = $_POST['entidad_oficial'];
    $dosis_necesarias = $_POST['dosis_necesarias'];
    $dosis_aplicadas = $_POST['dosis_aplicadas'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];

    $userid = $_SESSION["user_id"];
    /*
    INSERT INTO `vacunas` (`id`, `id_usuario`, `fecha`, `nombre_vacuna`, `dosis_necesarias`, `dosis_aplicadas`, `entidad_oficial`, `descripcion`, `lugar`) VALUES (NULL, '1', '2024-10-01', 'Epatitis B', '1', '1', '1', 'Buenas tardes', 'Malas tardes');
    */
    $db = new conexion_m();
    $sql = "INSERT INTO vacunas (id_usuario, fecha, nombre_vacuna, dosis_necesarias, dosis_aplicadas, entidad_oficial, descripcion, lugar) VALUES ('$userid', '$fecha', '$nombre_vacuna', '$dosis_necesarias', '$dosis_aplicadas', '$entidad_oficial', '$descripcion', '$lugar')";
    $db->query($sql);
    $db->close();
    header("Location: index");
} elseif ($_POST['accion'] == "editar") {
// UPDATE `vacunas` SET `descripcion` = 'No sé, soy gay..' WHERE `vacunas`.`id` = 6;
// UPDATE `vacunas` SET `nombre_vacuna` = 'Epatitis Xd', `dosis_necesarias` = '11', `dosis_aplicadas` = '11', `entidad_oficial` = '2', `lugar` = 'Pene míocdcd', `descripcion` = 'No sé, soy gay..cdcd' WHERE `vacunas`.`id` = 6;
$nombre_vacuna = $_POST['nombre_vacuna'];
$entidad_oficial = $_POST['entidad_oficial'];
$dosis_necesarias = $_POST['dosis_necesarias'];
$dosis_aplicadas = $_POST['dosis_aplicadas'];
$fecha = $_POST['fecha'];
$lugar = $_POST['lugar'];
$descripcion = $_POST['descripcion'];
$vacuna_id = $_POST['vacuna_id'];
$userid = $_SESSION["user_id"];

$db = new conexion_m();
$sql = "SELECT * FROM vacunas WHERE id = '$vacuna_id'";
$result = $db->query($sql);

$vacuna = mysqli_fetch_assoc($result);
// Si la vacuna no le pertenece
if ($vacuna['id_usuario'] != $_SESSION['user_id']) {
    header("Location: index");
    exit();
}

$sql = "UPDATE vacunas SET `nombre_vacuna` = '$nombre_vacuna', `dosis_necesarias` = $dosis_necesarias, `dosis_aplicadas` = $dosis_aplicadas, `entidad_oficial` = $entidad_oficial, `lugar` = '$lugar', `descripcion` = '$descripcion', `fecha` = '$fecha' WHERE `vacunas`.`id` = $vacuna_id";
$db->query($sql);
$db->close();
header("Location: vacuna?id=$vacuna_id");
} else {
    header("Location: index");
}