<?php
    session_start();

    $_SESSION = []; //Se reasigna la super global de session hacia un arreglo vacio y de esta manera cerramos sesion

    header("location: login.php");


?>