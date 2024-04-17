<?php
require_once "DAL/empleados.php";

$query = "SELECT * FROM categorias";
$resultadosQuery = getArray($query);

$errores = array();
$mensaje = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $imagen=$_FILES['archivo']['name'];
    $guardado=$_FILES['archivo']['tmp_name'];

    require_once "include/functions/recoge.php";

    $nombre = recogePost("nombre");

    $categoria = recogePost("categoria");

    $descripcion = recogePost("descripcion");

    $venta = recogePost("venta");

    $cantidad = recogePost("cantidad");

    $nombreOk          = false;
    $categoriaOk       = false;
    $descripcionOk     = false;
    $ventaOk           = false;
    $cantidadOk        = false;
    $imagenOk          = false;

    if ($nombre == ""){
        $errores[] = "No se digitó el nombre del producto";
    }else{
        $nombreOk = true;
    }

    

    if ($descripcion == ""){
        $errores[] = "No se digitó la descripcion";
    }else{
        $descripcionOk = true;
    }

    if ($venta == ""){
        $errores[] = "No se digitó la venta";
    }else if (!is_numeric($venta)) {
        $errores[] = "Solo se aceptan valores numéricos para la venta";
    }else{
        $ventaOk = true;
    }

    if ($cantidad == ""){
        $errores[] = "No se digitó la Cantidad del Producto";
    }else if (!is_numeric($cantidad)) {
        $errores[] = "Solo se aceptan valores numéricos para la Cantidad del Producto";
    }else{
        $cantidadOk = true;
    }


    if(!file_exists('archivos')){
	    mkdir('archivos',0777,true);
	    if(file_exists('archivos')){
		    if(move_uploaded_file($guardado, 'img/'.$imagen)){
			    //Archivo guardado con exito
                $imagenOk = true;
		    }else{
			    $errores[] = "La imagen no existe";
		    }
	    }
    }else{
	    if(move_uploaded_file($guardado, 'img/'.$imagen)){
		    //Archivo guardado con exito
            $imagenOk = true;
	    }else{
		    $errores[] = "Agregue una imagen";
	    }
    }

  
    if ($nombreOk && $descripcionOk &&  $ventaOk && $imagenOk && $cantidadOk) {
        if(AgregarProductos($categoria, $nombre, $descripcion, $venta, $imagen, $cantidad)){
            $mensaje = "El producto se agregó exitosamente.";
        }else{
            $errores[] = "Ocurrió un error al ingresar el dato a la base de datos";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto</title>
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

    <h1>Agregar Producto</h1>
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        
        <div class="form-group">
            <label for="categoriaNombre">Categoria</label>
            <select class="form-control" id="categoriaNombre" name="categoria" required>
                <?php foreach ($resultadosQuery as $resultado) : ?>
                    <option value="<?php echo $resultado['CategoriaID']; ?>"><?php echo $resultado['NombreCategoria']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
        </div>

        <div class="form-group">
            <label for="venta">Precio de Venta:</label>
            <input type="text" class="form-control" id="venta" name="venta">
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad Stock:</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad">
        </div>
        

        <div class="form-group">
              <input type="file" name="archivo" accept=".jpg, .png">
              <br><br>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </form>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        <?php if ($mensaje != "") : ?>
            Swal.fire({
                icon: 'success',
                title: '¡Producto agregado!',
                text: '<?php echo $mensaje; ?>',
            });
        <?php endif; ?>
    });
</script>

</body>
</html>