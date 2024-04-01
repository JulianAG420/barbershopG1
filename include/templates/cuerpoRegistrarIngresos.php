
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="VistaAdmin.php">Home</a>
        <a class="nav-link" href="IngresarEstilista.php">Ingresar Estilista</a>
        <a class="nav-link" href="ModificarInventario.php">Modificar Inventario</a>
        <a class="nav-link" href="ModificarPrecioArticulo.php">Modificar Precio Articulo</a>
        <a class="nav-link disabled" aria-disabled="true">Registrar Ingresos</a>
      </div>
    </div>
  </div>
</nav>

<body>
    <div class="container">
        <h1>Registrar Venta</h1>
        <form action=" " method="POST">
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <div class="form-group">
                <label for="metodo_pago">Método de Pago:</label>
                <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                    <option value="efectivo">Efectivo</option>
                    <option value="tarjeta">Tarjeta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="total_venta">Total de la Venta:</label>
                <input type="number" class="form-control" id="total_venta" name="total_venta" min="0" step="100.0" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>
    </div>
</body>
</html>
