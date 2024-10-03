<?php
require_once 'layouts/header.php';
if (isset($_SESSION["logged"])) {
    if ($_SESSION['logged'] == true) {
        header("Location: inicio");
        exit();
    }
}
?>

<h1 class="text-2xl text-center mt-[50px]">Plataforma personal para la gestión de vacunas.</h1>
<img src="static/img/enfermera.png" class="w-[80%] m-auto xl:w-[25%]" alt="">
<br>

<a href="auth/login">
    <div class="text-center">
        <button class="p-3 font-bold bg-gradient-to-r from-purple-700 to-blue-500 rounded-xl text-white text-2xl pl-[10%] pr-[10%] content-center">¡Entrar ahora!</button>
    </div>
</a>

<?php
require_once 'layouts/footer.php';
?>