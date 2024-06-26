<?php
require_once "include/templates/headLogin.php";

//Creacion de un arreglo para almacenar los errores
$errores = array();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "include/functions/recoge.php";

    //Sanitizacion de los elementos ingresados por el usuario
    $nombre = recogePost("nombre");
    $apellido = recogePost("apellido");
    $telefono = recogePost("telefono");
    $correo = recogePost("correo");
    $password = recogePost("password");

    //Formatos de validacion
    $patronNombre = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'; // Formato aceptado para letras y espacios
    $patronApellido = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'; // Formato aceptado para letras y espacios
    $patronTelefono = '/^\d{8}$/';// Formato aceptado telefono
    $patronCorreo = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'; // Formato aceptado de correo electrónico
    $patronPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'; // Formato aceptado para el password
    /*Debe contener al menos 8 caracteres.
    Debe incluir al menos una letra minúscula.
    Debe incluir al menos una letra mayúscula.
    Debe incluir al menos un dígito.
    Debe incluir al menos un carácter especial (por ejemplo, @$!%*?&)
    */

    //Identificacion match entre parametros aceptados vs los datos ingresados por el usuario
    $nombreOk = preg_match($patronNombre, $nombre);
    $apellidoOk = preg_match($patronApellido, $apellido);
    $telefonoOk = preg_match($patronTelefono, $telefono);
    $correoOk = preg_match($patronCorreo, $correo);
    $passwordOk = preg_match($patronPassword, $password);

    //Aplico un hash al password previo a ser ingresado a la DB
    $passwordHash = password_hash($passwordOk, PASSWORD_BCRYPT);

    //Creacion de errores e ingresados al arreglo
    if (!$nombreOk){
        $errores[] = "El nombre ingresado no es válido";
    }
    if (!$apellidoOk){
        $errores[] = "El apellido ingresado no es válido";
    }
    if (!$telefonoOk){
        $errores[] = "El formato de numero telefonico ingresado no es válido";
    }
    if (!$correoOk){
        $errores[] = "La direccion de correo no es válida";
    }
    if (!$passwordOk){
        $errores[] = "El password ingresado no es valido";
    }

    if ($nombreOk && $apellidoOk && $telefonoOk && $correoOk && $passwordOk){
        //Inclusion de el archivo donde estan mis funciones CRUD
        require_once "DAL/clientes.php";
        //Ingreso de los valores ingresados por el usuario a la DB
        if(IngresarClientes($nombre, $apellido, $telefono, $correo, $passwordHash)){
        header("Location: login.php?ingreso=1");
        }
    }else{
        $errores[] = "Ocurrió un error al ingresar el dato a base de datos";
    }
}
?>

<body>
    <header>
        <div>
            <h1>Crear Cuenta</h1>
        </div>
    </header>
    
<main class="contenedor">
<ul>
    <?php
        foreach ($errores as $error) {
            echo "<li class='error'>$error</li>";
        }
    ?>
</ul>
    <form method="POST">
        <?php require_once "include/templates/cuerpoCrearCuenta.php";?>
        <button  class="boton-azul" type="submit">Crear Cuenta</button>
    </form>
</main>

<div>
    <a class="boton" href="login.php">Regresar al Menu de Login</a>
</div>

<?php
    include "include/templates/footer.php";
?>