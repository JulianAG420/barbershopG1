<?php
require_once "DAL/productos.php";

$query = "SELECT * FROM productos
INNER JOIN categorias ON productos.CategoriaID = categorias.CategoriaID";

$resultadosQuery = getArray($query);

$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "include/functions/recoge.php";

    $id = recogePost("id");

    if ($id == "") {
        $errores[] = "Identificador incorrecto no se puede eliminar";
    }

    if (empty($errores)) {
        

        if (eliminarProducto($id)) {

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
    
    <h1>Productos Actuales</h1>

    <?php foreach ($resultadosQuery as $resultado) : ?>

        <form method="POST" id="formularioEliminar">
        <div class="estilista" id="estilista-<?php echo $resultado['ProductoID']; ?>">
            <div>
            <img src="img/<?php echo $resultado['Imagen']; ?>" alt="Foto de Producto <?php echo $resultado['ProductoID']; ?>">
                <p><strong>ID:</strong> <?php echo $resultado['ProductoID']; ?> </p>
                <p><strong>Categoria:</strong> <?php echo $resultado['NombreCategoria']; ?> </p>
                <p><strong>Nombre:</strong> <?php echo $resultado['Nombre']; ?> </p>
                <p><strong>Descripcion:</strong> <?php echo $resultado['Descripcion']; ?> </p>
                <p><strong>Precio de Venta:</strong> <?php echo $resultado['PrecioVenta']; ?> </p>

                <div class="action-buttons">
                    <input type="text" name="id" hidden value="<?= $resultado['ProductoID'] ?>">
                    <button class="btn btn-danger botones" type="submit">Eliminar</button> 
                </div>
            </div>
        </div>
        </form>
    <?php endforeach; ?>

</main>
