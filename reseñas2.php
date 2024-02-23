<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulario de Reseñas</title>
</head>
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
</body>
</html>


<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #1b2b34; 
    color: #fff; 
}

h1 {
    text-align: center;
    margin-top: 50px; 
}

form {
    width: 50%; 
    margin: 0 auto; 
    background-color: #fff; 
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="text"],
textarea,
input[type="number"],
input[type="date"],
input[type="submit"] {
    width: calc(100% - 22px); 
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; 
}

textarea {
    height: 100px; 
}

input[type="submit"] {
    background-color: #007bff; 
    color: #fff; 
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease; 
}

input[type="submit"]:hover {
    background-color: #0056b3; 
}


</style>