
<?php

require_once "DAL/empleados.php";

$query = "SELECT * FROM clientes";

$resultadosQuery = getArray($query);

$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  require_once "include/functions/recoge.php";

  $clienteNombre = recogePost("cliente");
  $pago = recogePost("pago");
  $fecha = recogePost("fecha");
  $venta = recogePost("venta");
  $descripcion = recogePost("descripcion");


  $clienteNombreOk        = false;
  $fechaOk                = false;
  $ventaOk                = false;
  $descripcionOk          = false;

  if ($clienteNombre == ""){
    $errores[] = "No hay un cliente disponible";
  }else{
    $clienteNombreOk = true;
  }
  
  if ($fecha == ""){
    $errores[] = "No se digito la fecha";
  }else{
    $fechaOk = true;
  }

  if ($venta == ""){
    $errores[] = "No se digito la venta";
  }
  else if (!is_numeric($venta)) {
    $errores[] = "Solo se acepta valores númericos";
  }else{
    $ventaOk = true;
  }
  
  if ($descripcion == ""){
    $errores[] = "Ingrese una descripcion";
  }else{
    $descripcionOk = true;
  }
  
  if ($clienteNombreOk && $fechaOk && $ventaOk && $descripcionOk) {
      
      if(RegistrarVenta($clienteNombre, $pago, $fecha, $venta , $descripcion)){
          
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
        <h1>Registar Ventas</h1>

        <form action="" method="POST">
            <div class="form-group">
                <label for="clientenombre">Cliente</label>
                <select class="form-control" id="clientenombre" name="cliente" required>
                    <?php foreach ($resultadosQuery as $resultado) : ?>
                        <option value="<?php echo $resultado['ClienteID']; ?>"><?php echo $resultado['Nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <select class="form-control" id="metodo_pago" name="pago" required>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
                </select>
            </div>

            <div class="form-group">
              <label for="fecha">Fecha</label>
              <input type="datetime-local" class="form-control" id="fecha" name="fecha">
            </div>

            <div class="form-group">
                <label for="venta">Total Venta</label>
                <input type="text" class="form-control" id="venta" name="venta">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>

            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>
    </div>
</body>

</html>