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
    

    if (!isset($_POST['nombre']) || !isset($_POST['identificacion']) || !isset($_POST['correo']) || !isset($_POST['ciudad']) || !isset($_POST['eps']) || !isset($_POST['foto']) || !isset($_POST['password'])) {
        header("Location: register");
        exit();
    }

} else {
    header("Location: ../");
    exit();
}