

<link rel="stylesheet" href="css/EscribirReseñas.css">
<body>
    <h1>Formulario de Reseñas</h1>
    <form action="procesar_reseña.php" method="POST">
        <label for="servicio_producto">Servicio o Producto:</label><br>
        <input type="text" id="servicio_producto" name="servicio_producto" required><br><br>

        <label for="experiencia">Experiencia:</label><br>
        <textarea id="experiencia" name="experiencia" rows="4" cols="50" required></textarea><br><br>

        <label for="puntuacion">Puntuación de Satisfacción:</label><br>
        <input type="number" id="puntuacion" name="puntuacion" min="1" max="5" required><br><br>

        <label for="fecha">Fecha de Reseña:</label><br>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <input type="submit" value="Enviar Reseña">
  
    </form>


<style>


</style>
