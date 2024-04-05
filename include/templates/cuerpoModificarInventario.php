<?php
require_once "DAL/empleados.php";

$query = "SELECT productos.ProductoID, productos.Nombre, productos.Descripcion, productos.PrecioVenta, productos.Imagen, inventario.CantidadStock FROM productos 
INNER JOIN inventario ON productos.ProductoID = inventario.ProductoID"; 

$resultadosQuery = getArray($query);

$errores = array();
$mensaje = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "include/functions/recoge.php";
    $Product = recogePost("producto");
    $nuevo_inventario = recogePost("nuevo_inventario");
    $nuevo_inventarioOk = false;

    if ($nuevo_inventario == ""){
        $errores[] = "Debe llenar todos los campos";
    } else if (!is_numeric($nuevo_inventario)) {
        $errores[] = "Solo se aceptan valores numéricos";
    } else {
        $nuevo_inventarioOk = true;
    }
    
    if ($nuevo_inventarioOk){
        if(ActualizarProducto($Product, $nuevo_inventario)){
            $mensaje = "El inventario se actualizó exitosamente.";
        }else{
            $errores[] = "Ocurrió un error al ingresar el dato a base de datos";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Inventario de Producto</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

<div class="container">
    <ul>
        <?php
        foreach ($errores as $error) {
            echo "<li class='error'>$error</li>";
        }
        ?>
    </ul>

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
            <input type="text" class="form-control" id="nuevo_inventario" name="nuevo_inventario" min="0" step="1.0">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Inventario</button>
    </form>
</div>
<script>
    $(document).ready(function() {
        <?php if ($mensaje != "") : ?>
            Swal.fire({
                icon: 'success',
                title: '¡Inventario actualizado!',
                text: '<?php echo $mensaje; ?>',
            });
        <?php endif; ?>
    });
</script>

</body>
</html>