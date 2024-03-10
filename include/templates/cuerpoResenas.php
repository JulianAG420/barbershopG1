<?php
require_once "DAL/resenas.php";


$query = "SELECT * FROM comentariosvaloraciones";

$resultadosQuery = getArray($query);

//var_dump($resultadosQuery);

?>

<body>
  <div class="links">
    <a href="index.php">Menu Principal</a>
    <a href="empleados.php">Estilistas</a>
    <a href="citas.php">Citas</a>
    <a href="productos.php">Productos</a>
    <a href="promociones.php">Promociones</a>
  </div>

  <h1>Nuestras Reseñas</h1>
  
  <?php foreach ($resultadosQuery as $resultado) : ?>
  <div class="review">
    <div class="rating"> <?php echo $resultado['Calificacion'] ;?> </div>
    <div class="content">

      <h3> <?php echo $resultado['Titulo'] ;?> </h3>

      <p> <?php echo $resultado['Comentario'] ;?> </p>
      <p> <?php echo $resultado['Fecha'] ;?> </p>
    </div>
  </div>
  <?php endforeach; ?>

  <button class="button" onclick="window.location.href = 'escribirResena.php';">Escribir una reseña</button>