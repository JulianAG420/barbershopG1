<?php
require_once "include/templates/head.php";

session_start();

$id = $_SESSION['id'];



//Creacion de un arreglo para almacenar los errores
$errores = array();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "include/functions/recoge.php";

    //Sanitizacion de los elementos ingresados por el usuario
    $titulo = recogePost("titulo");
    $descripcion = recogePost("experiencia");

    //Formatos de validacion
    $patronTitulo = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ!\s]+$/'; // Formato aceptado para letras y espacios
    $patronExperiencia = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ!\s]+$/'; // Formato aceptado para letras y espacios

    //Identificacion match entre parametros aceptados vs los datos ingresados por el usuario
    $tituloOk = preg_match($patronTitulo, $titulo);
    $experienciaOk = preg_match($patronExperiencia, $descripcion);

    //Creacion de errores e ingresados al arreglo
    if (!$tituloOk){
        $errores[] = "Entrada de datos incorrecta";
    }
    if (!$experienciaOk){
        $errores[] = "Entrada de datos incorrecta";
    }

    if ($tituloOk && $experienciaOk){
        //Inclusion de el archivo donde estan mis funciones CRUD
        require_once "DAL/resenas.php";
        //Ingreso de los valores ingresados por el usuario a la DB
        if(IngresarResena($id, $_POST['fecha'], $_POST['idEstilista'], $_POST['puntuacion'], $_POST['experiencia'], $_POST['titulo'])){
            header("Location: resenas.php?ingreso=4");
        }
    }else{
        $errores[] = "Ocurrió un error al ingresar el dato a base de datos";
    }
}

?>
<body>

<div class="links">
        <a href="resenas.php">Volver</a>
    </div>
    
<h1>Formulario de Reseñas</h1>

<main class="contenedor">

        <ul>
            <?php
            foreach ($errores as $error) {
                echo "<li class='error'>$error</li>";
            }
            ?>
        </ul>

    <form method="POST">
        <?php require_once "include/templates/cuerpoEscribirResena.php"; ?>
        <input type="submit" value="Enviar Reseña">
    </form>
</main>

<?php
include "include/templates/footer.php"
?>