<?php
require_once "include/templates/head.php"
?>

<link rel="stylesheet" href="css/reseñas.css">
<body>
  <div class="links">
    <a href="index.php">Ir a la página inicial</a>
    <a href="empleados.php">Ir a los empleados</a>
    <a href="productos.php">ir a la pagina de productos</a>
    <a href="citas.php">Citas</a>
    <a href="promociones.php">Promociones</a>
  </div>

  <h1>Nuestras Reseñas</h1>
  <div class="review">
    <div class="rating">4.5</div>
    <div class="content">

      <h3>Título de la reseña</h3>
      <p>Descripción detallada de la reseña.</p>
      <p>Fecha de la reseña: 22 de febrero de 2024</p>
    </div>
  </div>

  <div class="review">
    <div class="rating">3.8</div>
    <div class="content">
      <h3>Otra reseña</h3>
      <p>Otra descripción detallada de la reseña.</p>
      <p>Fecha de la reseña: 20 de febrero de 2024</p>
    </div>
  </div>
  <button class="button" onclick="window.location.href = 'EscribirReseña.php';">Escribir una reseña</button>


  <style>
    
  </style>

  <?php
  include_once "include/templates/footer.php"
  ?>