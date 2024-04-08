<?php
require_once "DAL/empleados.php";

$query = "SELECT * FROM estilistas";

$resultadosQuery = getArray($query);

$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "include/functions/recoge.php";

    
    $imagen = recogePost("imagen");
    $id = recogePost("id");

    if ($id == "") {
        $errores[] = "Identificador incorrecto no se puede eliminar";
    }

    if (empty($errores)) {
        

        if (EliminarEstilista($id)) {

            $nombre_archivo = 'img/'.$imagen;
            unlink($nombre_archivo);
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
    
    <h1>Estilistas Actuales</h1>

    <?php foreach ($resultadosQuery as $resultado) : ?>

        <form method="POST" id="formularioEliminar">
        <div class="estilista" id="estilista-<?php echo $resultado['EstilistaID']; ?>">
            <img src="img/<?php echo $resultado['imagen']; ?>" alt="Foto de Estilista <?php echo $resultado['EstilistaID']; ?>">
            <div>
                <p><strong>ID:</strong> <?php echo $resultado['EstilistaID']; ?> </p>
                <p><strong>Nombre:</strong> <?php echo $resultado['Nombre']; ?> </p>
                <p><strong>Apellido:</strong> <?php echo $resultado['Apellido']; ?> </p>
                <p><strong>Especialidades:</strong> <?php echo $resultado['Especialidades']; ?> </p>
                <p><strong>Horario de Trabajo:</strong> <?php echo $resultado['HorarioTrabajo']; ?> </p>
                <p><strong>Contacto:</strong> <?php echo $resultado['Contacto']; ?> </p>

                <div class="action-buttons">
                    <a class="btn btn-warning" href="editarEstilista.php?id=<?php echo $resultado['EstilistaID']; ?>">Editar</a>
                    <input type="text" name="id" hidden value="<?= $resultado['EstilistaID'] ?>">
                    <input type="hidden" name="imagen" value="<?php echo $resultado['imagen']; ?>">
                    <button class="btn btn-danger botones" type="submit">Eliminar</button> 
                </div>
            </div>
        </div>
        </form>
    <?php endforeach; ?>

</main>
