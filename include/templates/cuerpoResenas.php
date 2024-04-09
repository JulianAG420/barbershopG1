<?php
require_once "DAL/resenas.php";


$query = "SELECT * FROM comentariosvaloraciones INNER JOIN estilistas ON comentariosvaloraciones.EstilistaID = estilistas.EstilistaID";

$resultadosQuery = getArray($query);

//var_dump($resultadosQuery);

?>


  <h1>Nuestras Reseñas</h1>
  
  <?php foreach ($resultadosQuery as $resultado) : ?>
  <div class="review">
    <div class="rating"> <?php echo $resultado['Calificacion'] ;?> </div>
    <div class="content">

      <h3> Titulo: <?php echo $resultado['Titulo'] ;?> </h3>
      <p> Estilista: <?php echo $resultado['Nombre'] . " " . $resultado['Apellido'];?> </p>
      <p> Descripcion:  <?php echo $resultado['Comentario'] ;?> </p>
      <p> Fecha del servicio: <?php echo $resultado['Fecha'] ;?> </p>
    </div>
  </div>
  <?php endforeach; ?>

  <button class="button" onclick="window.location.href = 'escribirResena.php';">Escribir una reseña</button>