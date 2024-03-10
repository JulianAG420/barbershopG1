<?php


// Configurar el tiempo de vida de la sesión en segundos
$tiempo_vida = 1800; // 30 minutos

// Configurar el tiempo de vida de la cookie de sesión
session_set_cookie_params($tiempo_vida);
session_start();

// Verificar si ha pasado el tiempo de inactividad
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso']) > $tiempo_vida) {
    // Si ha pasado el tiempo de inactividad, destruir la sesión y redirigir a una página de inicio de sesión
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}elseif($_SESSION['login'] != true){
    header('Location: login.php');
    exit;
}

// Actualizar el tiempo de último acceso en cada carga de página
$_SESSION['ultimo_acceso'] = time();



require_once "include/templates/head.php";


if($_SESSION['tipoAcceso'] == 1){
    require_once "include/templates/cuerpoIndex.php";
}else{
    require_once "include/templates/cuerpoVistaAdmin.php";
}



include "include/templates/footer.php";

