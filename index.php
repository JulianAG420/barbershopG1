<?php
//Se reanuda la sesion proveniente desde el login con el usuario respectivo
session_start();
var_dump($_SESSION);
$login = true;
require_once "include/templates/head.php";
?>

<?php
require_once "include/templates/cuerpoIndex.php";
?>

<?php
include "include/templates/footer.php";
?>
