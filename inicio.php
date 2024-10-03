<?php
require_once 'layouts/header.php';

if (!isset($_SESSION["logged"])) {
        header("Location: auth/login");
        exit();
    } else {
        if ($_SESSION["logged"] != true) {
                header("Location: auth/login");
                exit(); 
        }
    }
?>
        <div class="">
            <h1 id="titulo" class="text-center text-3xl text-black mt-[60px]">!Hola <?php echo $_SESSION['user_nick'] ?>!</h1>
            <br>
            <h1 class="text-2xl text-center">Es bueno verte. Acá hay algunas cosas que puedes hacer</h1>
        </div>
        
        <a href="vacunas/"><div class="rounded-3xl text-white text-left font-bold bg-gradient-to-r from-blue-700 to-purple-500 w-[75%] m-auto h-fit p-3 mt-[60px] xl:w-fit xl:pl-[10px] xl:pr-[10px]">⚪ Ver tus registros</div></a>
        <a href="vacunas/registrar"><div class="rounded-3xl text-white text-left font-bold bg-gradient-to-r from-blue-700 to-purple-500 w-[75%] m-auto h-fit p-3 mt-[60px] xl:w-fit xl:pl-[10px] xl:pr-[10px]">⚪ Crear un registro</div></a>
        <a href="yo"><div class="rounded-3xl text-white text-left font-bold bg-gradient-to-r from-blue-700 to-purple-500 w-[75%] m-auto h-fit p-3 mt-[60px] xl:w-fit xl:pl-[10px] xl:pr-[10px]">⚪ Editar tu perfil</div></a>
<?php
require_once 'layouts/footer.php';
?>