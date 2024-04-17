
<?php
require_once "DAL/categoria.php";

$errores = array();
$mensaje = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once "include/functions/recoge.php";

    $nombreCategoria = recogePost("nombreCategoria");

    $nombreCategoriaOk = false;

    if ($nombreCategoria == ""){
        $errores[] = "No se digito una descripcion valida";
    }else{
        $nombreCategoriaOk = true;
    }
    
    
    if ($nombreCategoriaOk) {
        if(AgregarCategoria($nombreCategoria)){
            $mensaje = "La categoria se registró exitosamente.";
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
            <label for="nombreCategoria">Descripcion</label>
            <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria">
        </div>

        <button type="submit" class="btn btn-primary">Ingresar Categoria</button>
    </form>
</div>


<script>
    $(document).ready(function() {
        <?php if ($mensaje != "") : ?>
            Swal.fire({
                icon: 'success',
                title: 'Categoria registrada!',
                text: '<?php echo $mensaje; ?>',
            });
        <?php endif; ?>
    });
</script>

</body>
</html>