<?php
require_once "DAL/empleados.php";


$query = "SELECT productos.ProductoID, productos.Nombre, productos.Descripcion, productos.PrecioVenta, productos.Imagen, inventario.CantidadStock FROM productos 
INNER JOIN inventario ON productos.ProductoID = inventario.ProductoID"; 

$resultadosQuery = getArray($query);


$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  require_once "include/functions/recoge.php";

  $Product = recogePost("producto");
  $nuevo_inventario = recogePost("nuevo_inventario");

  $nuevo_inventarioOk = false;



  if ($nuevo_inventario == ""){
    $errores[] = "Debe llenar todos los campos";
    } else if (!is_numeric($nuevo_inventario)) {
    $errores[] = "Solo se acepta valores númericos";
  } else {
    $nuevo_inventarioOk = true;
  }
  
  
  if ($nuevo_inventarioOk){
      
      if(ActualizarProducto($Product, $nuevo_inventario)){
        
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
                <input type="text" class="form-control" id="nuevo_precio" name="nuevo_inventario" min="0" step="1.0">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Inventario</button>
        </form>
    </div>
</main>


</html>
