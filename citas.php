<?php
require_once "include/templates/head.php"
?>

<body>
    <!--banner y parte superior de las citas  -->
    <div id="banner"></div>
    <section id="agendar-cita">
        <h1>Agendar Cita</h1>

        <form method="post">
            <?php include "include/templates/cuerpoCitas.php"; ?>
        </form>
        
    </section>

    <section id="citas-imagen">
        <div class="fecha-disponible">
            <img src="img/cita.png" alt="Imagen Fecha Disponible">
        </div>
    </section>


    <?php
    include "include/templates/footer.php"
    ?>