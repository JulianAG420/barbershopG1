<?php
require_once "DAL/cita.php";

$query = "SELECT c.CitaID, s.Nombre, s.Precio, c.Fecha, c.Hora
FROM citas AS c
INNER JOIN citasservicios AS cs ON cs.CitaID = c.CitaID
INNER JOIN servicios AS s ON s.ServicioID = cs.ServicioID";

$resultadosQuery = getArray($query);

/*echo '<pre>';
var_dump($resultadosQuery);
echo '</pre>';*/

$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "include/functions/recoge.php";

    $id = recogePost("id");

    if ($id == "") {
        $errores[] = "Identificador incorrecto no se puede eliminar";
    }

    if (empty($errores)) {
        

        if (eliminarCita($id)) {

            header("Location: resumenCitas.php");
            
        } else {
            $errores[] = "Ocurrió un error al eliminar un estilista";
        }
    }
}

?>

<main>

    <ul>
        <?php
        foreach ($errores as $error) {
            echo "<li class='error'>$error</li>";
        }
        ?>
    </ul>
    
    <h1>Resumen de Citas Agendadas</h1>

    <?php foreach ($resultadosQuery as $resultado) : ?>

        <form method="POST" id="formularioEliminar">
        <div class="estilista" id="estilista-<?php echo $resultado['CitaID']; ?>">
            <div>
                <p><strong>ID:</strong> <?php echo $resultado['CitaID']; ?> </p>
                <p><strong>Descripcion:</strong> <?php echo $resultado['Nombre']; ?> </p>
                <p><strong>Precio:</strong> <?php echo $resultado['Precio']; ?> </p>
                <p><strong>Fecha:</strong> <?php echo $resultado['Fecha']; ?> </p>
                <p><strong>Hora:</strong> <?php echo $resultado['Hora']; ?> </p>

                <div class="action-buttons">
                    <input type="text" name="id" hidden value="<?= $resultado['CitaID'] ?>">
                    <input type="hidden" name="nombreServicio" value="<?php echo $resultado['Nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $resultado['Precio']; ?>">
                    <button class="btn btn-danger botones" type="submit">Cancelar Cita</button> 
                </div>
            </div>
        </div>
        </form>
    <?php endforeach; ?>

</main>