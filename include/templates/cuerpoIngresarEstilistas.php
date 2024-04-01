<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Estilista</title>
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
        <a class="nav-link" href="#">Registrar Ingresos</a>
        <a class="nav-link" href="ModificarEstilista.php">Modificar Estilista</a>
        <a class="nav-link" href="#">Modificar Inventario</a>
        <a class="nav-link" href="#">Modificar Precio Articulo</a>
        <a class="nav-link disabled" aria-disabled="true">Ingresar Estilista</a>
      </div>
    </div>
  </div>
</nav>
<body>
    <div class="container">
        <h1>Agregar Estilista</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="especialidades">Especialidades:</label>
                <input type="text" class="form-control" id="especialidades" name="especialidades" required>
            </div>
            <div class="form-group">
                <label for="horario">Horario de Trabajo:</label>
                <input type="text" class="form-control" id="horario" name="horario" required>
            </div>
            <div class="form-group">
                <label for="contacto">Contacto:</label>
                <input type="text" class="form-control" id="contacto" name="contacto" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Estilista</button>
        </form>
    </div>
</body>
</html>