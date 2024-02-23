<?php
require_once "include/templates/head.php";

//Creacion de un arreglo para almacenar los errores
$errores = array();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "include/functions/recoge.php";

    //Sanitizacion de los elementos ingresados por el usuario
    $correo = recogePost("correo");
    $nuevoPassword = recogePost("nuevoPassword");

    //Formatos de validacion
    $patronCorreo = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'; // Formato aceptado de correo electrónico
    $patronNuevoPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'; // Formato aceptado para el password
    /*Debe contener al menos 8 caracteres.
    Debe incluir al menos una letra minúscula.
    Debe incluir al menos una letra mayúscula.
    Debe incluir al menos un dígito.
    Debe incluir al menos un carácter especial (por ejemplo, @$!%*?&)
    */

    //Identificacion match entre parametros aceptados vs los datos ingresados por el usuario
    $correoOk = preg_match($patronCorreo, $correo);
    $nuevoPasswordOk = preg_match($patronNuevoPassword, $nuevoPassword);
    
    //Aplico un hash al password previo a ser ingresado a la DB
    $nuevoPasswordHash = password_hash($nuevoPasswordOk, PASSWORD_BCRYPT);

    //Creacion de errores e ingresados al arreglo
    if (!$correoOk){
        $errores[] = "La direccion de correo no es válida";
    }
    if (!$nuevoPasswordOk){
        $errores[] = "El password ingresado no es valido";
    }

    if ($correoOk && $nuevoPasswordOk){
        require_once "DAL/usuarios.php";
        if(recuperarPassword($correo,$nuevoPasswordHash)){
        header("Location: login.php?recuperar=2");
        }
    }else{
        $errores[] = "Ocurrió un error al ingresar el dato a base de datos";
    }
}
?>

<body>
    <header>
        <div>
            <h1>Recupera tu Password</h1>
        </div>
    </header>

<main class="contenedor">
<ul>
    <?php
        foreach ($errores as $error) {
            echo "<li$error</li>"; //pendiente agregar una clase al li
        }
    ?>
</ul>
    <form method="POST">
        <?php require_once "include/templates/cuerpoRecuperarPassword.php";?>
        <button type="submit">Recuperar Password</button>
    </form>
</main>

<div>
    <a href="login.php">Regresar al Menu de Login</a>
</div>

<?php
    include "include/templates/footer.php";
?>