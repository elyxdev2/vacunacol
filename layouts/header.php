<?php
$possible_core_route_a = "../utils/core.php";
$possible_core_route_b = "utils/core.php";

if (file_exists($possible_core_route_a)) {
  require $possible_core_route_a;
} else {
  if (file_exists($possible_core_route_b)) {
    require $possible_core_route_b;
  } else {
    exit("Fatal error.");
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VacunaCol</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $r_static?>/css/menu.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/29d2b0da58.js" crossorigin="anonymous"></script>
</head>
<body class="flex font-[Quicksand]">
    <div id="wrapper" class="h-[100vh] w-[100vw] bg-gradient-to-b from-[#FFFFFF] from-[36%] to-[#025478] xl:to-[#3d0278d2] flex flex-col">
      <div class="h-fit w-[100%] bg-gradient-to-r from-[#00a2ff83] to-[#0300c26c] pl-[15px] pr-[20px] pt-[18px] pb-[18px] flex xl:bg-[#313131] xl:from-[#313131] xl:to-[#313131] xl:pb-[8px] xl:pt-[8px]">
        <a href="/"><span class="font-medium text-3xl"><span class="text-[#efff0c]">Vac</span><span class="text-[#240cff]">una</span><span class="text-[#ff0c0c]">Col 💉</span></span></a>
        <button id="menu-btn" aria-expanded="false" aria-controls="menu" class="bg-black rounded-2xl text-white font-medium p-2 ml-auto border-2 border-white">☰</button>
        </div>
        <nav id="menu" class="fixed z-50 left-[45%] xl:left-[76%] top-[7%] w-[50%] xl:w-[20%] bg-black p-2 rounded-xl text-white text-center menu-hidden">
          <ul class="text-black">
          <?php 
          $lg_in = false;
          if (isset($_SESSION['logged'])) {
            if ($_SESSION['logged'] == true) {
              $lg_in = true;
            } else {
              $lg_in = false;
            }
          } else {
            $lg_in = false;
          }
          if ($lg_in == false) { // Sesión NO iniciada
            echo "
            <a href='$r_auth/login'><li class='rounded-2xl bg-gradient-to-r from-[#C100BA] to-[#16009F] mb-[16px] text-white font-bold p-1'>Iniciar sesión</li></a>
            <a href='$r_base'><li class='rounded-2xl bg-white font-bold mb-[8px] p-1'>Inicio</li></a>
            <a href='$r_base/tyc'><li class='rounded-2xl bg-white font-bold mb-[8px] p-1'>Términos y condiciones</li></a>
            <a href='$r_base/faq'><li class='rounded-2xl bg-white font-bold mb-[8px] p-1'>Preguntas frecuentes</li></a>
            <a href='$r_base/sobre_nosotros'><li class='rounded-2xl bg-white font-bold p-1'>Sobre nosotros</li></a>
            ";
          } else { // Sesión iniciada
            echo "
            <a href='$r_auth/logout'><li class='rounded-2xl bg-gradient-to-r from-[#C10000] to-[#9F7C00] mb-[16px] text-white font-bold p-1'>Cerrar sesión</li></a>
            <a href='$r_base/inicio'><li class='rounded-2xl bg-white font-bold mb-[8px] p-1'>Inicio</li></a>
            <a href='$r_vacunas/'><li class='rounded-2xl bg-white font-bold mb-[8px] p-1'>Ver registros</li></a>
            <a href='$r_vacunas/registrar'><li class='rounded-2xl bg-white font-bold mb-[8px] p-1'>Crear registro</li></a>
            <a href='$r_base/yo'><li class='rounded-2xl bg-white font-bold p-1'>Editar perfil</li></a>
            ";
          }
          ?>

          </ul>
        </nav>
        <main class="flex-grow xl:flex-grow-0 xl:bg-[#ffffff7e] xl:m-auto xl:w-[100%] xl:h-[85%] xl:rounded-3xl">