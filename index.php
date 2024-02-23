<?php
    //Se reanuda la sesion proveniente desde el login con el usuario respectivo
    session_start();
    var_dump($_SESSION);
    $login = true;
    require_once "include/templates/head.php";
?>

<header>
    <div>
        <a href="cerrarSesion.php">Cerrar Sesion</a>
    </div>
    <div>
        <img src="img/ImagenBanner.png" alt="Imagen Banner">
    </div>
</header>

<?php
    require_once "include/templates/cuerpoIndex.php";
?>

<?php
    include "include/templates/footer.php";
?>