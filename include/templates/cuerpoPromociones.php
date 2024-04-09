<?php
require_once "DAL/promociones.php";


$query = "SELECT * FROM promociones";

$resultadosQuery = getArray($query);

//var_dump($resultadosQuery);

?>
    <!--promociones con descripcion y demas atributos  -->
    <h1>Promociones por Tiempo Limitado Solo en Nuestra Tienda Fisica</h1>

    <?php foreach ($resultadosQuery as $resultado) : ?>
    <div class="promocion">
        <img src= <?php echo $resultado['Imagen'] ;?> alt="promo1">
        <h2><?php echo $resultado['NombrePromocion'] ;?></h2> 
        <p><strong>Descripción:</strong><?php echo $resultado['Descripcion'] ;?></p>
        <p><strong>Fecha de Inicio:</strong> <?php echo $resultado['FechaInicio'] ;?></p>
        <p><strong>Fecha de Fin:</strong> <?php echo $resultado['FechaFin'] ;?></p>
        <p><strong>Descuento:</strong><?php echo $resultado['Descuento'] ;?> %</p>
        <p><strong>Condiciones:</strong><?php echo $resultado['Condiciones'] ;?></p>
    </div>
    <?php endforeach; ?>
