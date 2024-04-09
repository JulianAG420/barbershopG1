<?php
require_once "DAL/servicios.php";

$query = "SELECT * FROM servicios";

$resultadosQuery = getArray($query);

$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "include/functions/recoge.php";

    $id = recogePost("id");

    if ($id == "") {
        $errores[] = "Identificador incorrecto no se puede eliminar";
    }

    if (empty($errores)) {
        

        if (eliminarServicio($id)) {

            header("Location: VistaAdmin.php");
            
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
    
    <h1>Servicios Actuales</h1>

    <?php foreach ($resultadosQuery as $resultado) : ?>

        <form method="POST" id="formularioEliminar">
        <div class="estilista" id="estilista-<?php echo $resultado['ServicioID']; ?>">
            <div>
                <p><strong>ID:</strong> <?php echo $resultado['ServicioID']; ?> </p>
                <p><strong>Descripcion:</strong> <?php echo $resultado['Nombre']; ?> </p>
                <p><strong>Precio:</strong> <?php echo $resultado['Precio']; ?> </p>

                <div class="action-buttons">
                    <a class="btn btn-warning" href="editarServicio.php?id=<?php echo $resultado['ServicioID']; ?>">Editar</a>
                    <input type="text" name="id" hidden value="<?= $resultado['ServicioID'] ?>">
                    <input type="hidden" name="nombreServicio" value="<?php echo $resultado['Nombre']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $resultado['Precio']; ?>">
                    <button class="btn btn-danger botones" type="submit">Eliminar</button> 
                </div>
            </div>
        </div>
        </form>
    <?php endforeach; ?>

</main>
