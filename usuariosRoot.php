<?php

require_once "DAL/usuarios.php";

//Instancia de conexion a la DB
$conexion = Conectar();

//Crear los usuarios root
$nombreCompleto1 = "Christopher C Diaz";
$email1 = "christophercd960@gmail.com";
$password1 = "Admin1!!";

$nombreCompleto2 = "Edwin Romero";
$email2 = "edwinromero1515@gmail.com";
$password2 = "Admin2!!";

$nombreCompleto3 = "Julian Aguirre";
$email3 = "julsag29@gmail.com";
$password3 = "Admin3!!";

$nombreCompleto4 = "Roberto Iribarren";
$email4 = "robertoiribarren020@gmail.com";
$password4 = "Admin4!!";

//Hashear el password
$passwordHash1 = password_hash($password1, PASSWORD_BCRYPT);
$passwordHash2 = password_hash($password2, PASSWORD_BCRYPT);
$passwordHash3 = password_hash($password3, PASSWORD_BCRYPT);
$passwordHash4 = password_hash($password4, PASSWORD_BCRYPT);

IngresarUsuarios($nombreCompleto1, $email1, $password1);
IngresarUsuarios($nombreCompleto2, $email2, $password2);
IngresarUsuarios($nombreCompleto3, $email3, $password3);
IngresarUsuarios($nombreCompleto4, $email4, $password4);

recuperarPassword($email1, $passwordHash1);
recuperarPassword($email2, $passwordHash2);
recuperarPassword($email3, $passwordHash3);
recuperarPassword($email4, $passwordHash4);

header("Location: login.php?ingreso=1");

?>
