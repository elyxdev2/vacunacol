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
                <h1 id="titulo" class="text-xl text-white font-medium">Registración 👥</h1>
            </div>
            <form action="auth" method="post">
                <div class="flex w-[100%] h-[85%] pt-[10%]">
                    <!-- Lado izquierdo-->
                    <div class="w-[50%] h-[80%] p-1 text-center border-r-2 border-r-gray-400">
                        <input type="hidden" name="accion" value="register">
                        <!-- Nombres -->
                        <label for="nombre" class="font-semibold">Nombres:</label>
                        <input type="text" name="nombres" id="nombre" placeholder="Ej: José Manuel" class="border-1 border-black mb-[12%] bg-gray-300 p-2 rounded-lg text-black" required>
                        <!-- Apellidos -->
                        <label for="apellidos" class="font-semibold">Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos" placeholder="Ej: Arcila Perez" class="border-1 border-black mb-[12%] bg-gray-300 p-2 rounded-lg text-black" required>
                        <!-- Numero ID.-->
                        <label for="n_id" class="font-semibold">Número de identificación:</label>
                        <input type="number" id="n_id" name="identificacion" placeholder="Ej: 0123456789" class="border-1 border-black mb-[12%] bg-gray-300 p-2 rounded-lg text-black" required>
                        <!-- Correo electrónico -->
                        <label for="email" class="font-semibold">Correo electrónico:</label>
                        <input type="email" id="email" name="correo" placeholder="Ej: josearcilap@gmail.com" class="border-1 border-black mb-[12%] bg-gray-300 p-2 rounded-lg text-black" autocomplete="email" required>
                        <!-- Género -->
                        <label for="genero" class="font-semibold">Sexo:</label>
                        <br>
                        <select name="genero" id="genero" class="text-center p-2 bg-gray-300 w-[95%] rounded-2xl border-1 border-black">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>

                    </div>
                    <!-- Lado derecho -->
                    <div class="w-[50%] h-[80%] p-1 text-center">
                        <span class="font-semibold">Tu foto de perfil:</span>
                        <img src="<?php echo $r_static ?>/img/doctor.png" class="w-[60%] m-auto mt-[10%] mb-[15%]">
                        <input name="foto" type="file" class="w-[80px] h-fit rounded-2xl text-sm  text-white bg-gray-500 border-1 border-black"></i>
                        <button class="w-[80px] rounded-2xl text-sm  text-white bg-gray-500 border-1 border-black">Borrar</button>
                        <br>
                        <!-- Contraseña -->
                        <div class="mt-[20%]">
                            <label for="contrasena" class="font-semibold">Contraseña:</label>
                            <input type="password" id="contrasena" name="password" placeholder="¡No la compartas!" class="mb-[23%] bg-gray-300 p-2 rounded-lg text-black border-1 border-black" required>
                            <!-- Registrarse -->
                            <input type="submit" value="¡Regístrate!" class="mb-[12%] w-[98%] bg-zinc-800 p-2 font-bold rounded-lg text-white border-2 border-white">
                        </div>
                    </div>
                </div>
            </form>

<?php
require_once '../layouts/footer.php';
?>