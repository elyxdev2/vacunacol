<?php
require_once '../layouts/header.php';
if (!isset($_SESSION["logged"])) {
    header("Location: ../auth/login");
    exit();
} else {
    if ($_SESSION["logged"] != true) {
        header("Location: ../auth/login");
        exit(); 
    }
}
// Not isset id
if (!isset($_GET['id'])) {
    header("Location: index");
    exit();
}
// Empty id
if (empty($_GET['id'])) {
    header("Location: index");
    exit();
}

// Obtiene la vacuna
require_once '../utils/connect.php';
$db = new conexion_m();
$vacunaid = $_GET['id'];
$sql = "SELECT * FROM vacunas WHERE id = '$vacunaid'";
$result = $db->query($sql);

// Si la vacuna no existe
if (mysqli_num_rows($result) < 1) {
    header("Location: index");
    exit();
}
$vacuna = mysqli_fetch_assoc($result);
// Si la vacuna no le pertenece
if ($vacuna['id_usuario'] != $_SESSION['user_id']) {
    header("Location: index");
    exit();
}

 /* 
nombre_vacuna
entidad_oficial
dosis_necesarias
dosis_aplicadas
fecha
lugar
descripcion
 */

$vacuna_necesarias = $vacuna['dosis_necesarias'];
$vacuna_aplicadas = $vacuna['dosis_aplicadas'];
$vacuna_entidad = $vacuna['entidad_oficial'];
$vacuna_descripcion = $vacuna['descripcion'];
$vacuna_nombre = $vacuna['nombre_vacuna'];
$vacuna_fecha = $vacuna['fecha'];
$vacuna_lugar = $vacuna['lugar'];
?>

<div class="rounded-xl bg-[#4C4276] w-[80%] m-auto h-fit text-center p-1 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px]">
    <h1 id="titulo" class="text-xl text-white font-medium">Editar vacuna: <?= $vacuna_nombre ?></h1>
</div>

<form class="font-medium mt-[50px] xl:mt-[20px] w-[100%] flex flex-wrap" method="POST" action="procesar">
<input type="hidden" name="vacuna_id" value="<?= $vacunaid ?>">
<input type="hidden" name="accion" value="editar">
<!-- Izq -->    
    <div class="w-[50%] h-fit">
        <!-- Nombre de la vacuna -->
        <div class="m-auto text-center">
            <label for="nombre_vacuna" class="font-bold">Nombre de la vacuna*</label><br>
            <input id="nombre_vacuna" value="<?= $vacuna_nombre?>" name="nombre_vacuna" type="text" placeholder="Ej: Epatitis B" class="bg-[#D9D9D9] p-2 rounded-2xl w-[80%]" required>
        </div>
    
        <!-- Entidad oficial -->
        <div class="m-auto text-center">
            <label for="entidad_oficial" class="font-bold">Entidad oficial?*</label><br>
            <select name="entidad_oficial" id="entidad_oficial" class="bg-[#D9D9D9] p-2 rounded-2xl w-[80%]">
                <option value=1 <?php if($vacuna_entidad == 1) {echo "selected";}?> >Sí</option>
                <option value=0 <?php if($vacuna_entidad == 0) {echo "selected";}?> >No</option>
            </select>
        </div>
    
        <!-- Dosis necesarias -->
        <div class="m-auto text-center">
            <label for="dosis_necesarias" class="font-bold">Dosis necesarias*</label><br>
            <input id="dosis_necesarias" name="dosis_necesarias" type="number" value="<?= $vacuna_necesarias?>" class="bg-[#D9D9D9] p-2 rounded-2xl w-[80%]" required>
        </div>
    </div>
<!-- Der -->    
    <div class="w-[50%] h-fit">
            <!-- Fecha -->
    <div class="m-auto text-center">
        <label for="fecha" class="font-bold">Fecha*</label><br>
        <input id="fecha" name="fecha" type="date" value="<?= $vacuna_fecha?>" placeholder="Ej: 12/07/2024" class="bg-[#D9D9D9] p-2 rounded-2xl w-[80%]" required>
    </div>
    
    <!-- Lugar -->
    <div class="m-auto text-center">
        <label for="lugar" class="font-bold">Lugar*</label><br>
        <input id="lugar" name="lugar" type="text" value="<?= $vacuna_lugar?>" placeholder="Ej: Comfama Aranjuez" class="bg-[#D9D9D9] p-2 rounded-2xl w-[80%]" required>
    </div>

    <!-- Dosis aplicadas -->
    <div class="m-auto text-center">
        <label for="dosis_aplicadas" class="font-bold">Dosis actual*</label><br>
        <input id="dosis_aplicadas" name="dosis_aplicadas" type="number" value="<?= $vacuna_aplicadas?>" class="bg-[#D9D9D9] p-2 rounded-2xl w-[80%]" required>
    </div>
    </div>

    <div class="text-center m-auto mt-[15px] mb-[15px]">
        <h1 class="text-2xl font-bold text-center xl:hidden">Opcional</h1>
    </div>

    <div class="m-auto text-center">
        <label for="descripcion" class="xl:hidden">Descripción / Anotaciones</label>
        <textarea class="bg-[#D9D9D9] p-2 rounded-2xl" name="descripcion" id="descripcion" cols="30" rows="7" placeholder="Efectos secundarios, anotaciones entre otros..."><?= $vacuna_descripcion?></textarea>
    </div>

    <div class="m-auto w-[85%] text-center">
    <div class="flex">
        <div class="p-2 rounded-2xl bg-gradient-to-r from-[#AD0000] to-[#470000] text-white m-auto text-center self-center font-semibold w-[45%]" onclick="redirigir('vacuna?id=<?= $vacunaid ?>')">Descartar ❌</div>
        <button type="submit" class="p-2 rounded-2xl bg-gradient-to-r from-[#00AD5A] to-[#280047] text-white m-auto text-center self-center font-semibold w-[45%]">Guardar 💾</button>
    </div>    
        <div class="p-2 mt-[30px] rounded-2xl bg-gradient-to-r from-orange-500 to-[#470000] text-white m-auto text-center self-center font-semibold w-[45%]" onclick="redirigir('eliminar?id=<?= $vacunaid ?>')">Eliminar 🚮</div>
    </div>

</form>

<?php
require_once '../layouts/footer.php';
?>