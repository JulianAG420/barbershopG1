
<?php

require_once "DAL/empleados.php";

$imagen = 'default.png';


$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

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
  
  if ($nombreOk && $apellidoOk && $especialidadesOk && $horarioOk && $contactoOk) {
     
      if(AgregarEstilista($nombre, $apellido, $especialidades, $horario, $contacto, $imagen)){
          
        header("Location: VistaAdmin.php");
        
      }else{
        $errores[] = "Ocurrió un error al ingresar el dato a base de datos";
      }
  }
}


?>


<body>

    <ul>
        <?php
        foreach ($errores as $error) {
            echo "<li class='error'>$error</li>";
        }
        ?>
    </ul>

    <div class="container">
        <h1>Agregar Estilista</h1>
        <form action="" method="POST">
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
            <button type="submit" class="btn btn-primary">Agregar Estilista</button>
        </form>
    </div>
</body>
</html>