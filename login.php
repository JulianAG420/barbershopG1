<?php
$login = false;
require_once "include/templates/headLogin.php";

//Creacion de un arreglo para almacenar los errores
$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "include/functions/recoge.php";
    $correo = recogePost("correo");
    $password = recogePost("password");
    //var_dump($_POST);
    
    //Formatos de validacion
    $patronCorreo = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'; // Formato aceptado de correo electrónico
    $patronPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'; // Formato aceptado para el password
    /*Debe contener al menos 8 caracteres.
    Debe incluir al menos una letra minúscula.
    Debe incluir al menos una letra mayúscula.
    Debe incluir al menos un dígito.
    Debe incluir al menos un carácter especial (por ejemplo, @$!%*?&)
    */

    //Identificacion match entre parametros aceptados vs los datos ingresados por el usuario
    $correoOk = preg_match($patronCorreo, $correo);
    $passwordOk = preg_match($patronPassword, $password);

    if (!$correoOk) {
        $errores[] = "Hubo un error validando el correo, valide que este correcto";
    }
    if (!$passwordOk) {
        $errores[] = "Hubo un error validando la contraseña, valide que este correcta";
    }

    if (empty($errores)) {
        //Inclusion de el archivo donde estan mis funciones CRUD
        //require_once "DAL/usuarios.php";
        require_once "DAL/clientes.php";

        $queryCliente = "SELECT clienteid, nombre, apellido, telefono, email, pass_word, accesousuarioid FROM clientes WHERE email = '$correo'";
        $queryAdmin = "SELECT usuarioid, email, pass_word, accesousuarioid, nombrecompleto FROM usuarios WHERE email = '$correo'";

        $sesionAbiertaCliente = getObject($queryCliente);
        $sesionAbiertaAdmin = getObject($queryAdmin);


        //Validacion de datos segun el query ejecutado en la sesion
        if ($sesionAbiertaCliente != NULL || $sesionAbiertaAdmin != NULL) {
            //Verificacion de contraseñas entre lo ingresado por el usuario y lo almacenado en la DB
            $authCliente = password_verify($passwordOk, $sesionAbiertaCliente['pass_word']);
            $authAdmin = password_verify($passwordOk, $sesionAbiertaAdmin['pass_word']);
            //Si la autenticacion es verdadera abre un session thread
            if ($authCliente) {
                session_start();
                $_SESSION['usuario'] = $sesionAbiertaCliente['email'];
                $_SESSION['id'] = $sesionAbiertaCliente['clienteid'];
                $_SESSION['tipoAcceso'] = $sesionAbiertaCliente['accesousuarioid'];
                $_SESSION['login'] = TRUE;
                header("Location: index.php?cliente&id={$_SESSION['id']}");
            } elseif ($authAdmin) {
                session_start();
                $_SESSION['usuario'] = $sesionAbiertaAdmin['email'];
                $_SESSION['id'] = $sesionAbiertaAdmin['usuarioid'];
                $_SESSION['tipoAcceso'] = $sesionAbiertaAdmin['accesousuarioid'];
                $_SESSION['login'] = TRUE;
                header("Location: index.php?admin&id={$_SESSION['id']}");
            } else {
                $errores[] = "Contraseña Incorrecta";
            }
        } else {
            $errores[] = "El Usuario no Existe";
        }
    }
}
?>

<body>
    <header>
        <div>
            <h1>Inicio de Sesion</h1>
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
            <?php require_once "include/templates/cuerpoLogin.php"; ?>
            <button class="boton-azul" type="submit">Ingresar</button>
        </form>
    </main>

    <div style="margin-top: 2rem; margin-right: 40; text-align: center;" class="contenedor">
        <a class="boton" href="crearCuenta.php">Registrarse</a>
    </div>

    <div style="margin-top: 4rem; margin-right: 40; text-align: center;" class="contenedor">
        <a class="boton" href="recuperarPassword.php">Restaurar Contraseña</a>
    </div>


    <?php
    include "include/templates/footer.php";
    ?>