<?php
require_once "include/templates/headAdmin.php";
require_once "DAL/servicios.php";

$id = $_GET['id'];

$query = "SELECT * FROM servicios WHERE ServicioID = $id";

$resultadosQuery = getArray($query);

$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  require_once "include/functions/recoge.php";

  $nombreServicio = recogePost("nombreServicio");
  $precio = recogePost("precio");

  $nombreServicioOk = false;
  $precioOk = false;

  if ($nombreServicio == "" || !preg_match("/^[a-zA-Z ]*$/",$nombreServicio)){
    $errores[] = "No se digito una descripcion valida";
  }else{
    $nombreServicioOk = true;
  }

  if ($precio == ""){
    $errores[] = "No se digitó un precio valido";
  }else{
    $precioOk = true;
  }
  
  
  if ($nombreServicioOk && $precioOk) {
      
      if(actualizarServicio($nombreServicio, $precio, $id)){
          
        header("Location: VistaAdmin.php");
        
         
      }else{
        $errores[] = "Ocurrió un error al ingresar el dato a base de datos";
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

    <h1>Editar un Servicio</h1>

    <?php foreach ($resultadosQuery as $resultado) : ?>
        <form method="POST">
        <div class="estilista" id="estilista-<?php echo $resultado['ServicioID']; ?>">
            <div>
                <p><strong>ID:</strong> <?php echo $resultado['ServicioID']; ?> </p>
                <p><strong>Descripcion:</strong> <?php echo $resultado['Nombre']; ?> </p>
                <p><strong>Precio:</strong> <?php echo $resultado['Precio']; ?> </p>
            </div>
        </div>
        </form>
    <?php endforeach; ?>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombreServicio">Descripcion</label>
                <input type="text" class="form-control" id="nombreServicio" name="nombreServicio">
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

</main>



<?php
include_once "include/templates/footer.php";
?>