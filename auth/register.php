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
            <div class="xl:hidden"> <!-- MOVIL -->
            <form action="auth" method="post" enctype="multipart/form-data">
                <div class="flex w-[100%] h-[85%] pt-[10%] xl:pt-[1%]">
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
                        <img id="imagePreview" src="<?php echo $r_static ?>/img/doctor.png" class="w-[60%] m-auto mt-[10%] mb-[15%] xl:mt-[1%] xl:mb-[1%] xl:w-[20%]">
                        <input name="foto" id="foto" type="file" class="hidden" accept="image/*"></i>
                        <div class="w-[80px] rounded-2xl text-sm  text-white bg-gray-500 border-1 border-black m-auto cursor-pointer"><label for="foto" class="cursor-pointer">Elegir</label></div>
                        <div class="w-[80px] rounded-2xl text-sm  text-white bg-gray-500 border-1 border-black m-auto cursor-pointer" onclick="borrar()">Borrar</div>
                        <br>
                        <!-- Contraseña -->
                        <div class="mt-[0%] xl:mt-[10%]">
                            <label for="contrasena" class="font-semibold">Contraseña:</label>
                            <input type="password" id="contrasena" name="password" placeholder="¡No la compartas!" class="mb-[23%] xl:mb-[5%] bg-gray-300 p-2 rounded-lg text-black border-1 border-black" required>
                            <!-- Registrarse -->
                            <input type="submit" value="¡Regístrate!" class="mb-[12%] xl:w-[20%] w-[98%] bg-zinc-800 p-2 font-bold rounded-lg text-white border-2 border-white">
                        </div>
                    </div>
                </div>
            </form>
            </div>

            <!-- PC -->
            <div class="hidden xl:flex w-fit h-fit m-auto">
            <form action="auth" method="post" enctype="multipart/form-data">
                <div class="flex w-fit h-fit">

                    <div class="w-[50%] text-center">
                        <input type="hidden" name="accion" value="register">
                        <!-- Nombres -->
                        <label for="nombre" class="font-semibold">Nombres:</label><br>
                        <input type="text" name="nombres" id="nombre" placeholder="Ej: José Manuel" class="border-1 border-black bg-gray-300 p-2 rounded-lg text-black" required><br>
                        <!-- Apellidos -->
                        <label for="apellidos" class="font-semibold">Apellidos:</label><br>
                        <input type="text" name="apellidos" id="apellidos" placeholder="Ej: Arcila Perez" class="border-1 border-black bg-gray-300 p-2 rounded-lg text-black" required><br>
                        <!-- Numero ID.-->
                        <label for="n_id" class="font-semibold">Número de identificación:</label><br>
                        <input type="number" id="n_id" name="identificacion" placeholder="Ej: 0123456789" class="border-1 border-black bg-gray-300 p-2 rounded-lg text-black" required><br>
                        <!-- Correo electrónico -->
                        <label for="email" class="font-semibold">Correo electrónico:</label><br>
                        <input type="email" id="email" name="correo" placeholder="Ej: josearcilap@gmail.com" class="border-1 border-black bg-gray-300 p-2 rounded-lg text-black" autocomplete="email" required><br>
                        <!-- Género -->
                        <label for="genero" class="font-semibold">Sexo:</label><br>
                        <select name="genero" id="genero" class="text-center p-2 rounded-2xl border-1 border-black w-[100%]">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                        </div>
                        <div class="w-[50%] text-center">
                            <span class="font-semibold">Tu foto de perfil:</span><br>
                            <img id="imagePreview2" src="<?php echo $r_static ?>/img/doctor.png" class="m-auto" width="84" height="84"><br>
                            <input name="foto" id="foto" type="file" class="hidden" accept="image/*"></i><br>
                            <div class="flex">
                                <div class="w-[80px] rounded-2xl text-sm  text-white bg-gray-500 border-1 border-black m-auto cursor-pointer"><label for="foto" class="cursor-pointer">Elegir</label></div>
                                <div class="w-[80px] rounded-2xl text-sm  text-white bg-gray-500 border-1 border-black m-auto cursor-pointer" onclick="borrar()">Borrar</div>
                            </div>
                            <br>
                            <!-- Contraseña -->
                            <div class="mt-[16px]">
                                <label for="contrasena" class="font-semibold">Contraseña:</label><br>
                                <input type="password" id="contrasena" name="password" placeholder="¡No la compartas!" class="mb-[23%] xl:mb-[5%] bg-gray-300 p-2 rounded-lg text-black border-1 border-black" required><br>
                                <!-- Registrarse -->
                                <input type="submit" value="¡Regístrate!" class="mt-[10px] w-[100%] bg-zinc-800 p-2 font-bold rounded-2xl cursor-pointer text-white border-2 border-white">
                            </div>
                        </div>
                </div>
            </form>
            </div>

            <script>
        document.getElementById('foto').addEventListener('change', function(event) {
            // Verifica si se seleccionó un archivo
            if (event.target.files && event.target.files[0]) {
                // Crea un objeto URL para la nueva imagen seleccionada
                let reader = new FileReader();
                
                // Cuando se carga el archivo, reemplaza el src de la imagen
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview2').src = e.target.result;
                }
                
                // Lee la imagen como una URL
                reader.readAsDataURL(event.target.files[0]);
            }
        });
        function borrar() {
            document.getElementById('imagePreview').src = "/static/img/doctor.png";
            document.getElementById('imagePreview2').src = "/static/img/doctor.png";
        }
    </script>

<?php
require_once '../layouts/footer.php';
?>