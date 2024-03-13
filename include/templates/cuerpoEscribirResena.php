<?php
require_once "DAL/resenas.php";

$query = "SELECT * FROM estilistas";

$resultadosQuery = getArray($query);
?>

<label for="titulo">Titulo:</label><br>
<input type="text" id="titulo" name="titulo" required><br><br>

<label for="nombre">Quien fue su Estilista:</label><br>
<select id="nombre" name="nombre">
    <?php foreach ($resultadosQuery as $resultado) : ?>
        <option value="$resultado['Nombre'] . ' ' . $resultado['Apellido']"><?php echo $resultado['Nombre'] . ' ' . $resultado['Apellido'] ?></option>
    <?php endforeach; ?>
</select><br><br>

<label for="experiencia">Describa su Experiencia:</label><br>
<textarea id="experiencia" name="experiencia" rows="4" cols="50" required></textarea><br><br>

<label for="puntuacion">Puntuación de Satisfacción:</label><br>
<input type="number" id="puntuacion" name="puntuacion" min="1" max="5" required><br><br>

<label for="fecha">Fecha de Reseña:</label><br>
<input type="date" id="fecha" name="fecha" required><br><br>
