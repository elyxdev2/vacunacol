<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VacunaCol</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./js/tailwind.config.js"></script>
    <script src="https://kit.fontawesome.com/29d2b0da58.js" crossorigin="anonymous"></script>
</head>
<body class="flex">
    <div id="wrapper" class="h-[100vh] w-[100vw] bg-gradient-to-b from-[#FFFFFF] from-[36%] to-[#025478] xl:to-[#3d0278d2] flex flex-col">
        <nav class="h-fit w-[100%] bg-gradient-to-r from-[#00a2ff83] to-[#0300c26c] pl-[15px] pr-[20px] pt-[18px] pb-[18px] flex xl:bg-[#313131] xl:from-[#313131] xl:to-[#313131] xl:pb-[8px] xl:pt-[8px]">
            <span class="font-medium text-3xl"><span class="text-[#efff0c]">Vac</span><span class="text-[#240cff]">una</span><span class="text-[#ff0c0c]">Col</span></span>
            <div id="menu" class="ml-auto">
                <div id="items" class="xl:flex hidden">
                    
                </div>
                    <button class="text-sm rounded-3xl bg-[#333333] p-[2px] pl-[7px] pr-[7px] text-white xl:hidden"><i class="fa-solid fa-bars"></i></button>
            </div>
        </nav>
        <main class="flex-grow xl:flex-grow-0 xl:bg-[#ffffff7e] xl:m-auto xl:w-[95%] xl:h-[85%] xl:rounded-3xl">
            <div class="rounded-xl bg-[#4C4276] w-[80%] m-auto h-fit text-center p-1 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px]">
                <h1 id="titulo" class="text-xl text-white font-medium">Preguntas Frecuentes</h1>
            </div>
            <div class="xl:hidden">
            <a href="#" class=""><div class="text-center"><button class="rounded-3xl bg-[#9688ce] w-[75%] m-auto h-fit text-center p-3 mt-[60px] xl:w-fit xl:pl-[10px] xl:pr-[10px] text-white">¡Entrar ahora!</button></div></a>
            <a href="#" class=""><div class="text-center"><button class="rounded-3xl bg-[#9688ce] w-[75%] m-auto h-fit text-center p-3 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px] text-white">¡Entrar ahora!</button></div></a>
            <a href="#" class=""><div class="text-center"><button class="rounded-3xl bg-[#9688ce] w-[75%] m-auto h-fit text-center p-3 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px] text-white">¡Entrar ahora!</button></div></a>
            <a href="#" class=""><div class="text-center"><button class="rounded-3xl bg-[#9688ce] w-[75%] m-auto h-fit text-center p-3 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px] text-white">¡Entrar ahora!</button></div></a>
            <a href="#" class=""><div class="text-center"><button class="rounded-3xl bg-[#9688ce] w-[75%] m-auto h-fit text-center p-3 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px] text-white">¡Entrar ahora!</button></div></a>
            <a href="#" class=""><div class="text-center"><button class="rounded-3xl bg-[#9688ce] w-[75%] m-auto h-fit text-center p-3 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px] text-white">¡Entrar ahora!</button></div></a>
        </div>
        
        </main>
        <footer class="h-[20vh] w-[100%] bg-gradient-to-b from-[#57005480] to-[#00000081] mt-auto flex flex-wrap text-white xl:hidden">
            <span class="h-fit mt-[15px] ml-[13%] items-center">Derechos reservados VacunaCol &copy 2024</span>
            <div class="w-[50%] h-fit text-justify">
            <a href="" class="underline">Preguntas frecuentes</a>
            <br>
            <a href="" class="underline">Términos y condiciones</a>
            <br>
            <img src="./img/insts.png" alt="" class="w-[35%] mt-[5%]">
        </div>
        <div class="w-[50%] h-fit">
            <a href="#">Dirección: </a>
            <br>
            <a href="#">Teléfono: </a>
        </div>
        </footer>
    </div>
</body>
</html>