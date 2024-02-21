<?php
$login = true;
require_once "include/templates/head.php";

//Creacion de un arreglo para almacenar los errores
$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "include/functions/recoge.php";
    $correo = recogePost("correo");
    $password = recogePost("password");
    var_dump($_POST);
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
        require_once "DAL/usuarios.php";

        $query = "SELECT usuarioid, email, pass_word, accesousuarioid, nombrecompleto FROM usuarios WHERE email = '$correo'";

        $sesionAbierta = getObject($query);
        var_dump($sesionAbierta);

        //Validacion de datos segun el query ejecutado en la sesion
        if ($sesionAbierta != NULL) {
            //Verificacion de contraseñas entre lo ingresado por el usuario y lo almacenado en la DB
            $auth = password_verify($passwordOk, $sesionAbierta['pass_word']);
            //Si la autenticacion es verdadera abre un session thread
            if ($auth) {
                session_start();
                $_SESSION['usuario'] = $sesionAbierta['email'];
                $_SESSION['id'] = $sesionAbierta['usuarioid'];
                $_SESSION['login'] = $sesionAbierta['true'];
                header("Location: index.php");
            }else{
                $errores[] = "Contraseña Incorrecta";
                
            }
        }else{
            $errores[] = "El Usuario no Existe";
        }
    }
}
?>

<body>
    <header>
        <div>
            <h1>Login</h1>
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
            <button type="submit">Ingresar</button>
        </form>
    </main>

    <div>
        <a href="crearCuenta.php">Registrarse</a>
        <a href="recuperarPassword.php">Restaurar Contraseña</a>
    </div>
    
<?php
    include "include/templates/footer.php";
?>