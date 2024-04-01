<?php
require_once "DAL/empleados.php";


$query = "SELECT productos.ProductoID, productos.Nombre, productos.Descripcion, productos.PrecioVenta, productos.Imagen, inventario.CantidadStock FROM productos 
INNER JOIN inventario ON productos.ProductoID = inventario.ProductoID"; 

$resultadosQuery = getArray($query);

//var_dump($resultadosQuery);

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="VistaAdmin.php">Home</a>
        <a class="nav-link" href="RegistrarIngresos.php">Registrar Ingresos</a>
        <a class="nav-link" href="IngresarEstilista.php">Ingresar Estilista</a>
        <a class="nav-link" href="ModificarEstilista.php">Modificar Estilista</a>
        <a class="nav-link" href="ModificarPrecioArticulo.php">Modificar Precio Articulo</a>
        <a class="nav-link disabled" aria-disabled="true">Modificar Inventario</a>
      </div>
    </div>
  </div>
</nav>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Inventario de Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Modificar Inventario de Producto</h1>
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
                <label for="nuevo_inventario">Actualizar Inventario :</label>
                <input type="number" class="form-control" id="nuevo_precio" name="nuevo_inventario" min="0" step="1.0" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Inventario</button>
        </form>
    </div>
</body>
</html>
