<?php
require_once 'layouts/header.php';
if (isset($_SESSION["logged"])) {
    if ($_SESSION['logged'] == true) {
        header("Location: inicio");
        exit();
    }
}
?>

<h1 class="text-2xl text-center mt-[50px]">Plataforma de gestión de vacunas colombianas.</h1>
<img src="static/img/enfermera.png" class="w-[80%] m-auto xl:w-[25%]" alt="">
<br>

<a href="auth/login">
    <div class="text-center">
        <button class="p-3 font-medium bg-[#3f3f3f] rounded-xl text-white text-2xl pl-[10%] pr-[10%] content-center">¡Entrar ahora!</button>
    </div>
</a>

<?php
require_once 'layouts/footer.php';
?>