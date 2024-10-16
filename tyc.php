<?php
require_once 'layouts/header.php';
?>
    <style>
        /* Estilos básicos para el pop-up */
        #popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 10;
            width: 300px;
            border-radius: 10px;
        }

        #overlay {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9;
        }

        #terms {
            max-height: 200px;
            overflow-y: auto;
        }

        #closeBtn {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #6200ea;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
            <div class="rounded-xl bg-[#4C4276] w-[80%] m-auto h-fit text-center p-1 mt-[30px] xl:w-fit xl:pl-[10px] xl:pr-[10px]">
                <h1 id="titulo" class="text-xl text-white font-medium">Términos y condiciones</h1>
            </div>

    <!-- Div que activa el pop-up -->
    <div id="triggerDiv" style="padding: 10px; background-color: #6200ea; color: white; cursor: pointer; text-align: center;" class="w-fit m-auto mt-[10%]">
        Haz clic para ver los Términos y Condiciones
    </div>

    <!-- Pop-up con términos y condiciones -->
    <div id="overlay"></div>
    <div id="popup">
        <h3>Términos y Condiciones</h3>
        <div id="terms">
            <p><strong>1. Uso del Servicio:</strong> El usuario se compromete a utilizar el servicio de manera responsable y conforme a las leyes y normativas vigentes. Cualquier uso indebido o violación de los términos puede resultar en la suspensión o cancelación de la cuenta sin previo aviso. El servicio no se hace responsable por el mal uso de la plataforma por parte del usuario.</p>
            <p><strong>2. Responsabilidad Limitada:</strong> El servicio se proporciona "tal cual", sin garantías de ningún tipo, expresas o implícitas. No nos hacemos responsables por daños directos, indirectos, incidentales o consecuenciales derivados del uso o imposibilidad de uso del servicio. El usuario asume todos los riesgos relacionados con el uso de la plataforma.</p>
        </div>
        <button id="closeBtn">Cerrar</button>
    </div>

    <script>
        const triggerDiv = document.getElementById('triggerDiv');
        const popup = document.getElementById('popup');
        const overlay = document.getElementById('overlay');
        const closeBtn = document.getElementById('closeBtn');

        // Mostrar el pop-up
        triggerDiv.addEventListener('click', function() {
            popup.style.display = 'block';
            overlay.style.display = 'block';
        });

        // Cerrar el pop-up
        closeBtn.addEventListener('click', function() {
            popup.style.display = 'none';
            overlay.style.display = 'none';
        });

        // Cerrar el pop-up al hacer clic en el overlay
        overlay.addEventListener('click', function() {
            popup.style.display = 'none';
            overlay.style.display = 'none';
        });
    </script>
<?php
require_once 'layouts/footer.php';
?>