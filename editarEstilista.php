<?php
require_once "include/templates/headAdmin.php";
require_once "DAL/empleados.php";

$id = $_GET['id'];

$query = "SELECT * FROM estilistas WHERE EstilistaID = $id";

$resultadosQuery = getArray($query);


$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  $imagen=$_FILES['archivo']['name'];
  $guardado=$_FILES['archivo']['tmp_name'];

  require_once "include/functions/recoge.php";

  $nombre = recogePost("nombre");
  $apellido = recogePost("apellido");
  $especialidades = recogePost("especialidades");
  $horario = recogePost("horario");
  $contacto = recogePost("contacto");

  $nombreOk         = false;
  $apellidoOk       = false;
  $especialidadesOk = false;
  $horarioOk        = false;
  $contactoOk       = false;
  $imagenOk         = false;

  if ($nombre == "" || !preg_match("/^[a-zA-Z ]*$/",$nombre)){
    $errores[] = "No se digito el nombre o contiene caracteres no válidos";
  }else{
    $nombreOk = true;
  }

  if ($apellido == "" || !preg_match("/^[a-zA-Z ]*$/",$apellido)){
    $errores[] = "No se digito el apellido o contiene caracteres no válidos";
  }else{
    $apellidoOk = true;
  }

  if ($especialidades == "" || !preg_match("/^[a-zA-Z ]*$/",$especialidades)){
    $errores[] = "No se digito la especialidad o contiene caracteres no válidos";
  }else{
    $especialidadesOk = true;
  }

  if ($horario == ""){
    $errores[] = "No se digito el horario";
  }else{
    $horarioOk = true;
  }

  if ($contacto == "" || !filter_var($contacto, FILTER_VALIDATE_EMAIL)){
    $errores[] = "No se digito el contacto o no es un correo electrónico válido";
  }else{
    $contactoOk = true;
  }
  
  $imagenN = recogePost("imagen"); // Este es el nombre de la imagen existente

  // Verifica si se ha subido un archivo
  if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
    $imagen=$_FILES['archivo']['name'];
    $guardado=$_FILES['archivo']['tmp_name'];

    // Intenta mover el archivo subido
    if(!file_exists('archivos')){
      mkdir('archivos',0777,true);
    }
    if(move_uploaded_file($guardado, 'img/'.$imagen)){
        //Archivo guardado con exito
        $nombre_archivo = 'img/'.$imagenN;
        unlink($nombre_archivo);
        $imagenOk = true;
    }else{
      $errores[] = "La imagen no se pudo guardar";
    }
  } else {
    // Si no se ha subido ningún archivo, usa el nombre de la imagen existente
    $imagen = $imagenN;
    $imagenOk = true;
  }
  
  if ($nombreOk && $apellidoOk && $especialidadesOk && $horarioOk && $contactoOk && $imagenOk) {
      
      if(ActualizarEstilista($nombre, $apellido, $especialidades, $horario, $contacto, $imagen, $id)){
          
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

    <h1>Editar un Estilista</h1>

    <?php foreach ($resultadosQuery as $resultado) : ?>
        <form method="POST">
        <div class="estilista" id="estilista-<?php echo $resultado['EstilistaID']; ?>">
            <img src="img/<?php echo $resultado['imagen']; ?>" alt="Foto de Estilista <?php echo $resultado['EstilistaID']; ?>">
            <div>
                <p><strong>ID:</strong> <?php echo $resultado['EstilistaID']; ?> </p>
                <p><strong>Nombre:</strong> <?php echo $resultado['Nombre']; ?> </p>
                <p><strong>Apellido:</strong> <?php echo $resultado['Apellido']; ?> </p>
                <p><strong>Especialidades:</strong> <?php echo $resultado['Especialidades']; ?> </p>
                <p><strong>Horario de Trabajo:</strong> <?php echo $resultado['HorarioTrabajo']; ?> </p>
                <p><strong>Contacto:</strong> <?php echo $resultado['Contacto']; ?> </p>
            </div>
        </div>
        </form>
    <?php endforeach; ?>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
            </div>
            <div class="form-group">
                <label for="especialidades">Especialidades:</label>
                <input type="text" class="form-control" id="especialidades" name="especialidades">
            </div>
            <div class="form-group">
                <label for="horario">Horario de Trabajo:</label>
                <input type="text" class="form-control" id="horario" name="horario">
            </div>
            <div class="form-group">
                <label for="contacto">Contacto:</label>
                <input type="text" class="form-control" id="contacto" name="contacto">
            </div>

            <div class="form-group">
              <input type="file" name="archivo" accept=".jpg, .png">
              <br><br>
            </div>

            <input type="hidden" name="imagen" value="<?php echo $resultado['imagen']; ?>">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

</main>



<?php
include_once "include/templates/footer.php";
?>