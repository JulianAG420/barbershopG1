<?php
require_once "DAL/empleados.php";

$query = "SELECT * FROM estilistas";

$resultadosQuery = getArray($query);

/* echo '<pre>';
var_dump($resultadosQuery);
echo '</pre>'; */
?>

<label for="nombre">Día de Reserva:</label>
<select id="nombre" name="nombre">
    <?php foreach ($resultadosQuery as $resultado) : ?>
        <option value="$resultado[Nombre] . ' ' . $resultado[Apellido]"><?php echo $resultado['Nombre'] . ' ' . $resultado['Apellido'] ?></option>
    <?php endforeach; ?>
</select><br><br>
<label for="fecha">Día de Reserva:</label>
<input type="date" id="fecha" name="fecha"><br>
<label for="hora">Hora de Reserva:</label>
<input type="time" id="hora" name="hora"><br><br>
<button class="boton" type="submit">Agendar</button>