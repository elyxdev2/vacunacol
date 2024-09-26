<?php
require_once '../layouts/header.php';
?>
            <div class="rounded-xl bg-[#4C4276] w-[80%] m-auto h-fit text-center p-1 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px]">
                <h1 id="titulo" class="text-xl text-white font-medium">Iniciar sesión</h1>
            </div>
            <div id="login-frame" class="rounded-xl bg-[#4C4276] w-[80%] m-auto mt-[12vh] pt-[10%] h-[50%] text-center p-1 text-white">
                <!--<form action="#" method="post">-->
                    <input type="hidden" name="accion" value="login">
                    <label for="username" class="font-medium text-xl pt-[15px]">Usuario</label>
                    <br>
                    <input name="username" id="username" placeholder="Documento de identidad" type="text" class="p-2 rounded-xl mb-[10%] text-black">
                    <br>
                    <label for="password" class="font-medium text-xl pt-[15px]">Contraseña:</label>
                    <br>
                    <input name="password" id="password" placeholder="Ingresa tu contraseña" type="password" class="p-2 rounded-xl mb-[10%] text-black">
                    <br>
                    <!-- Tempora, eliminar este <a> --><a href="/inicio"><input type="submit" class="bg-[#292929] p-2 rounded-2xl w-[50%] text-xl" value="Entrar"></a>
                <!--</form>-->
            </div>
            <p class="text-center text-lg font-semibold">¿No tienes una cuenta? Regístrate <a href="register" class="text-purple-700 font-medium mt-[2px]">aquí</a></p>
<?php
require_once '../layouts/footer.php';
?>