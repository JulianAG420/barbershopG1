<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reseñas</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="links">
        <a href="index.php">Ir a la página inicial</a>
        <a href="empleados.php">Ir a los empleados</a>
        <a href="productos.php">ir a la pagina de productos</a>
        <a href="citas.php">Citas</a>
        <a href="promociones.php">Promociones</a>
        </div>
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
  <button class="button" onclick="window.location.href = 'reseñas2.php';">Escribir una reseña</button>
 
</body>
</html>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.review {
  border: 1px solid #ccc;
  margin-bottom: 20px;
  padding: 10px;
  display: flex;
}

.rating {
  background-color: #f8b400;
  color: #fff;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  font-size: 20px;
  margin-right: 20px;
}

.content {
  flex-grow: 1;
}

h3 {
  margin-top: 0;
}

p {
  margin-bottom: 5px;
}
.button {
      background-color: #4CAF50; 
      border: none;
      color: white; 
      padding: 20px 40px; 
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 10px; 
      transition-duration: 0.4s; 
    }

   
    .button:hover {
      background-color: #45a049; 
    }
    .links a {
    display: inline-block;
    margin: 10px;
    padding: 10px 20px;
    background-color: #f0f0f0;
    color: #333;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.links a:hover {
    background-color: #ddd;
}
</style>