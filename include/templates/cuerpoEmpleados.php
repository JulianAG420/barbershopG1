<?php
require_once "DAL/empleados.php";


$query = "SELECT * FROM estilistas";

$resultadosQuery = getArray($query);

//var_dump($resultadosQuery);

?>


<body>
    <div class="links">
        <a href="index.php">Menu Principal</a>
        <a href="resenas.php">Reseñas</a>
        <a href="citas.php">Citas</a>
        <a href="productos.php">Productos</a>
        <a href="promociones.php">Promociones</a>
    </div>
    <!-- estilistas con sus atributos-->
    <h1>Nuestros Estilistas y Horario de la Barbería</h1>

    <?php foreach ($resultadosQuery as $resultado) : ?>
        <div class="estilista">
            <img src="img/<?php echo $resultado['imagen']; ?>" alt="Foto de Estilista 1">
            <div>
                <p><strong>Nombre:</strong> <?php echo $resultado['Nombre']; ?> </p>
                <p><strong>Apellido:</strong> <?php echo $resultado['Apellido']; ?> </p>
                <p><strong>Especialidades:</strong> <?php echo $resultado['Especialidades']; ?> </p>
                <p><strong>Horario de Trabajo:</strong> <?php echo $resultado['HorarioTrabajo']; ?> </p>
                <p><strong>Contacto:</strong> <?php echo $resultado['Contacto']; ?> </p>
            </div>
        </div>
    <?php endforeach; ?>

    <!--seccion de horarios -->
    <div id="horarios">
        <h2>Nuestros Horarios</h2>
        <p>Lunes a Viernes: 9:00 AM - 8 PM</p>
        <p>Sábado: 9:00 AM - 6 PM</p>
        <p>Domingo: Cerrados</p>
    </div>