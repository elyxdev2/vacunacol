<?php
// Evitar requests get
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: login");
    exit();
}

if (!isset($_POST['accion'])) {
    // No hay acción a realizar
    header("Location: login");
    exit();    
}

// Si es post y hay acción a realizar se importa la conexión a la base de datos
session_start();
include '../utils/connect.php';

if ($_POST['accion'] == "login") {
    // Si es login pero no hay usuario ni contraseña se devuelve
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        header("Location: login");
        exit();
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Si los hay pero están vacíos se devuelve
    if (empty($username) || empty($password)) {
        header("Location: login");
        exit();
    }
    $db = new conexion_m(); // Se crea la conexión a la base de datos
    $sql = "SELECT * FROM usuarios WHERE identificacion = '$username' LIMIT 1";
    $result = $db->query($sql);
    $db->close(); // Se cierra la base de datos
    // Validar el usuario y contraseña con la base de datos
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    // Verificar la contraseña
    if (password_verify($password, $user['contrasena'])) {
        // Contraseña correcta: guardar datos en la sesión
        $_SESSION['logged'] = True;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['identificacion'];
        $_SESSION['user_nick'] = $user['nombres'];
        header("Location: ../inicio");
      } else {
        // Contraseña incorrecta
        $_SESSION['error'] = "¡Identificación o contraseña incorrectas!";
        header("Location: login");
        exit();
      }
    } else {
        // Usuario no encontrado
        $_SESSION['error'] = "¡Usuario no encontrado!";
        header("Location: login");
        exit();
      }

} elseif ($_POST['accion'] == "register") {
    // Si no están los datos necesarios se devuelve
    
    /* db
nombres - nombres
apellidos - apellidos
identificacion - numero id
correo - correo
genero - sexo
password- contraseña    
foto - foto
    */

    // Validar
    if (!isset($_POST['nombres']) || !isset($_POST['apellidos']) || !isset($_POST['identificacion']) || !isset($_POST['correo']) || !isset($_POST['genero']) || !isset($_POST['password'])) {
        echo "Error not isset";
        //header("Location: register");
        exit();
    }
    // Declarar
    $identificacion = $_POST['identificacion'];
    $apellidos = $_POST['apellidos'];
    $password = $_POST['password'];
    $nombre = $_POST['nombres'];
    $correo = $_POST['correo'];
    $genero = $_POST['genero'];
    $foto = $_POST['foto'];

    // Verificar
    if (empty($identificacion) || empty($apellidos) || empty($password) || empty($nombre) || empty($correo) || empty($genero)) {
        echo "Error: Llenar";
        exit();
    }

    $db = new conexion_m(); // Se crea la conexión a la base de datos
    $sql = "SELECT * FROM usuarios WHERE identificacion = '$identificacion' LIMIT 1";
    $result = $db->query($sql);
    // Validar el usuario y contraseña con la base de datos
    if ($result && mysqli_num_rows($result) > 0) {
        echo "Error: Correo ya registrado";
        exit();
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    /* 
    INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `identificacion`, `correo`, `contrasena`, `genero`, `foto`) VALUES (NULL, 'Juan José', 'Mazo Rodríguez', '1034992398', 'juanmazor@gmail.com', '$2y$10$dyHwbCfTmAUXJGfzF8lGqe87ao7RlRRFVV9oYXCogsAhK0Eu6ioGq', 'M', NULL);
    */

    // Insertar el nuevo usuario
    $sql_insert = "INSERT INTO `usuarios` (id, nombres, apellidos, identificacion, correo, contrasena, genero, foto) VALUES (NULL, '$nombre', '$apellidos', '$identificacion', '$correo', '$hashed_password', '$genero', NULL)";
    // Registra el usuario
    $db->query($sql_insert);
    // Busca el usuario recién registrado
    $sql = "SELECT * FROM usuarios WHERE identificacion = '$identificacion' LIMIT 1";
    $result = $db->query($sql);
    $user = mysqli_fetch_assoc($result);
    // Cierra la conexión
    $db->close();
    // Inicia sesión
    $_SESSION['logged'] = True;
    $_SESSION['user_name'] = $identificacion;
    $_SESSION['user_nick'] = $nombre;
    $_SESSION['user_id'] = $user['id'];
    header("Location: ../inicio");
} elseif ($_POST['accion'] == "guardar") {
    if ($_SESSION['logged'] != True) {
        header("Location: login");
        exit();
    }
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $genero = $_POST['genero'];
    $userid = $_SESSION['user_id'];
    $sql = "UPDATE `usuarios` SET `nombres` = '$nombres', `apellidos` = '$apellidos', `correo` = '$correo', `genero` = '$genero' WHERE `usuarios`.`id` = $userid";
    $db = new conexion_m();
    $db->query($sql);
    $_SESSION['estado2'] = "¡Guardado!";
    header("Location: ../yo");
    exit();
} else {
    header("Location: ../");
    exit();
}