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
                <h1 id="titulo" class=" text-center text-3xl text-black mt-[60px]">!Hola [NOMBRE]!</h1>
                <br>
                <h1 class="text-2xl text-center">Es bueno verte otra vez. Acá hay algunas cosas que puedes hacer</h1>
            </div>
            <div class="xl:hidden">
            <a href="#" class=""><div class="text-center"><button class="rounded-3xl bg-[#9688ce] w-[75%] m-auto h-fit text-center p-3 mt-[60px] xl:w-fit xl:pl-[10px] xl:pr-[10px] text-white">¡Entrar ahora!</button></div></a>
            <a href="#" class=""><div class="text-center"><button class="rounded-3xl bg-[#9688ce] w-[75%] m-auto h-fit text-center p-3 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px] text-white">¡Entrar ahora!</button></div></a>
            <a href="#" class=""><div class="text-center"><button class="rounded-3xl bg-[#9688ce] w-[75%] m-auto h-fit text-center p-3 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px] text-white">¡Entrar ahora!</button></div></a>
        </div>
<?php
require_once 'layouts/footer.php';
?>