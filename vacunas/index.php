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
?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>


<div class="rounded-xl bg-[#4C4276] w-[80%] m-auto h-fit text-center p-1 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px]">
    <h1 id="titulo" class="text-xl text-white font-medium">Registro de vacunas</h1>
</div>
<div class="text-center">
    <span class="text-zinc-500">Haga click en cualquier registro para verlo a detalle.</span>
</div>
<table class="m-auto mt-[10%] text-center table-fixed" id="tabla_vacunas">
    <thead class="bg-[#4C4276] text-white font-medium">
        <tr>
            <th>Nombre de la vacuna</th>
            <th>Fecha</th>
            <th>Lugar</th>
        </tr>
    </thead>
    <tbody class="bg-blue-300 text-black">
        <!-- Aquí van las filas con los datos de las vacunas -->
        <a href="inicio">
            <tr class="hover:bg-blue-400 transition duration-200 hover:font-black" onclick="redirigir('prueba')">
                <td>Covid 19</td>
                <td>19/11/2021</td>
                <td>Comfama Manrique</td>
            </tr>
        </a>
        <tr>
            <td>VIH/Sida</td>
            <td>18/09/2024</td>
            <td>Comfama Manrique</td>
        </tr>
    </tbody>
</table>

<script>
    let table = new DataTable('#tabla_vacunas', {
    searching: false,
    ordering:  false
});
</script>

<?php
require_once '../layouts/footer.php';
?>