
<?php
require_once "DAL/servicios.php";

$errores = array();
$mensaje = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once "include/functions/recoge.php";

    $nombreServicio = recogePost("nombreServicio");
    $precio = recogePost("precio");

    $nombreServicioOk = false;
    $precioOk = false;


    if ($nombreServicio == ""){
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
        if(ingresarServicios($nombreServicio, $precio)){
            $mensaje = "El servicio se registró exitosamente.";
        }else{
            $errores[] = "Ocurrió un error al ingresar el dato a la base de datos";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   
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


    <h1>Ingresar Servicios</h1>
    <form id="formulario" action="" method="POST">

        <div class="form-group">
            <label for="nombreServicio">Descripcion</label>
            <input type="text" class="form-control" id="nombreServicio" name="nombreServicio">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio">
        </div>

        <button type="submit" class="btn btn-primary">Ingresar Servicio</button>
    </form>
</div>


<script>
    $(document).ready(function() {
        <?php if ($mensaje != "") : ?>
            Swal.fire({
                icon: 'success',
                title: 'Servicio registrado!',
                text: '<?php echo $mensaje; ?>',
            });
        <?php endif; ?>
    });
</script>

</body>
</html>