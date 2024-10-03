<?php
require_once '../layouts/header.php';
if (isset($_SESSION["logged"])) {
    if ($_SESSION['logged'] == true) {
        header("Location: ../inicio");
        exit();
    }
}
?>
            <div class="rounded-xl bg-[#4C4276] w-[80%] m-auto h-fit text-center p-1 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px]">
                <h1 id="titulo" class="text-xl text-white font-medium">Iniciar sesión</h1>
            </div>
            
            <div id="login-frame" class="rounded-xl border-2 border-black bg-zinc-700 w-[80%] m-auto mt-[12vh] pt-[10%] h-[50%] text-center p-1 text-white">
            <form action="auth" method="post">
                    <input type="hidden" name="accion" value="login">
                    <label for="username" class="font-medium text-xl pt-[15px]">Usuario 👤</label>
                    <br>
                    <input name="username" id="username" placeholder="Ej: 1234567890" type="text" class="border-2 border-black p-2 rounded-xl mb-[10%] text-black" required>
                    <br>
                    <label for="password" class="font-medium text-xl pt-[15px]">Contraseña 🔑</label>
                    <br>
                    <input name="password" id="password" placeholder="Ingresa tu contrase{a" type="password" class="border-2 border-black p-2 rounded-xl mb-[10%] text-black" required>
                    <br>
                    <input type="submit" class="bg-black p-2 rounded-2xl w-[50%] text-xl font-bold" value="Entrar">
                </form>
            <?php 
            if (isset($_SESSION['error'])) {
                echo '<div class="text-center m-auto text-red-400 w-fit text-xl font-medium bg-black p-2 rounded-xl mt-[3%]">'. $_SESSION['error']. '</div>';
                unset($_SESSION['error']);
            }
        ?>    
            </div>
            <p class="text-center text-lg font-semibold">¿No tienes una cuenta? Regístrate <a href="register" class="text-purple-700 font-bold mt-[2px] underline">aquí</a></p>
<?php
require_once '../layouts/footer.php';
?>