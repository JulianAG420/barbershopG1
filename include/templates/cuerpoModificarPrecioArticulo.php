<?php
require_once "DAL/empleados.php";


$query = "SELECT productos.Nombre, productos.Descripcion, productos.PrecioVenta, productos.Imagen, inventario.CantidadStock FROM productos 
INNER JOIN inventario ON productos.ProductoID = inventario.ProductoID"; 

$resultadosQuery = getArray($query);

//var_dump($resultadosQuery);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Precio de Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Modificar Precio de Producto</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="producto">Producto:</label>
                <select class="form-control" id="producto" name="producto" required>
                    <?php foreach ($resultadosQuery as $resultado) : ?>
                        <option value="<?php echo $resultado['ProductoID']; ?>"><?php echo $resultado['Nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nuevo_precio">Nuevo Precio (₡):</label>
                <input type="number" class="form-control" id="nuevo_precio" name="nuevo_precio" min="0" step="100.0" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Precio</button>
        </form>
    </div>
</body>
</html>
