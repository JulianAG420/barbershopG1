<?php
require_once "DAL/empleados.php";


$query = "SELECT * FROM estilistas";

$resultadosQuery = getArray($query);
?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
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
        <a class="nav-link" href="ModificarInventario.php">Modificar Inventario</a>
        <a class="nav-link" href="ModificarPrecioArticulo.php">Modificar Precio Articulo</a>
        <a class="nav-link disabled" aria-disabled="true">Modificar Estilista</a>
      </div>
    </div>
  </div>
</nav>

    <!-- Estilistas con sus atributos -->
    <h1>Estilistas Actuales</h1>

    <?php foreach ($resultadosQuery as $resultado) : ?>
        <div class="estilista">
            <img src="img/<?php echo $resultado['imagen']; ?>" alt="Foto de Estilista 1">
            <div>
                <p><strong>Nombre:</strong> <?php echo $resultado['Nombre']; ?> </p>
                <p><strong>Apellido:</strong> <?php echo $resultado['Apellido']; ?> </p>
                <p><strong>Especialidades:</strong> <?php echo $resultado['Especialidades']; ?> </p>
                <p><strong>Horario de Trabajo:</strong> <?php echo $resultado['HorarioTrabajo']; ?> </p>
                <p><strong>Contacto:</strong> <?php echo $resultado['Contacto']; ?> </p>

<!-- Botones para modificar y eliminar -->
                 <div class="action-buttons">
                 
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</body>
