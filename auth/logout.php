<?php
require_once "../layouts/header.php";
if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['logged'])) {
    if ($_SESSION['logged'] != false) {
        $_SESSION['logged'] = false;
        $_SESSION['user_name'] = null;
        session_destroy();
        echo "
        <h1 class='text-2xl font-bold text-center mt-[50%] xl:mt-[15%]'>¡Sesión cerrada!</h1>
        <p class='text-lg font-semibold text-center'>Regresando al inicio en 3 segundos...</p>
        <script>setTimeout(function(){window.location.replace('$r_base');}, 3000)</script>
        ";
    }
} else {
    header("Location: ../index");
    exit(); 
}
require_once "../layouts/footer.php";