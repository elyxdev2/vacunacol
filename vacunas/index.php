<?php
require_once '../layouts/header.php';
require_once '../utils/connect.php';
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
    <h1 id="titulo" class="text-xl text-white font-medium">Registro de vacunas 📃</h1>
</div>
<div class="text-center">
    <span class="text-zinc-500">Haga click en cualquier registro para verlo a detalle.</span>
</div>
<table class="m-auto mt-[10%] table-fixed" id="tabla_vacunas">
    <thead class="bg-[#4C4276] text-white font-medium">
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Lugar</th>
        </tr>
    </thead>
    <tbody class="bg-blue-300 text-black">
        <?php
        $db = new conexion_m();
        $userid = $_SESSION['user_id'];
        $sql = "SELECT * FROM vacunas WHERE id_usuario = $userid";
        $result = $db->query($sql);
        $db->close();
        // Si hay coindicencias
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $vacunaid = $row['id'];
                echo "<tr class='hover:bg-blue-400 transition duration-200 hover:font-black' onclick='redirigir(\"vacuna?id=$vacunaid\")'>";
                echo "<td>". $row['nombre_vacuna']. "</td>";
                echo "<td>". $row['fecha']. "</td>";
                echo "<td>". $row['lugar']. "</td>";
                echo "</tr>";
            }    
        }
        ?>
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