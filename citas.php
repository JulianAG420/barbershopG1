<?php
require_once "include/templates/head.php"
?>

<body>
    <div class="links">
        <a href="index.php">Menu Principal</a>
        <a href="empleados.php">Estilistas</a>
        <a href="resenas.php">Reseñas</a>
        <a href="productos.php">Productos</a>
        <a href="promociones.php">Promociones</a>
    </div>

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