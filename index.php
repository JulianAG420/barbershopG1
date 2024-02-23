<?php
    //Se reanuda la sesion proveniente desde el login con el usuario respectivo
    session_start();
    var_dump($_SESSION);
    $login = true;
    require_once "include/templates/head.php";
?>


<!-- SE EMPIEZA EL HTML -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido a nuestra página</h1>
    </div>
    <header>
        <div>
            <img src="img/ImagenBanner.png" alt="Imagen Banner">
        </div>
    </header>

    <div class="section-links">
    <a href="empleados.php" class="section-link">
        <h2>Sección de Empleados</h2>
    </a>

    <a href="reseñas.php" class="section-link">
        <h2>Sección de Reseñas</h2>
    </a>

    <a href="recuperarPassword.php" class="section-link">
        <h2>Sección de Reinicio de Clave</h2>
    </a>

    <a href="citas.php" class="section-link">
        <h2>Sección de Citas</h2>
    </a>

    <a href="promociones.php" class="section-link">
        <h2>Sección de Promociones</h2>
    </a>
    <a href="productos.php" class="section-link">
        <h2>Sección de Productos</h2>
    </a>
</div>


    
    <div>
        <a href="cerrarSesion.php">Cerrar Sesión</a>
    </div>
</body>
</html>


<?php
    require_once "include/templates/cuerpoIndex.php";
?>

<?php
    include "include/templates/footer.php";
?>



<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.section-links {
    display: flex;
    flex-direction: column;
    align-items: stretch; 
}

.section-link {
    margin-bottom: 20px; 
    padding: 20px;
    background-color: #f9f9f9;
    border: 2px solid #007bff;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    text-align: center;
    width: 100%; 
}

.section-link:hover {
    transform: translateY(-5px);
}

.section-link h2 {
    margin-top: 0;
    color: #333333;
}


.container {
    max-width: 800px;
    margin: 20px auto;
    text-align: center;
}

 .contenedor-imagen img {
 display: block; 
 margin-left: auto; 
 margin-right: auto; 
        }
</style>
<div>
        <a href="cerrarSesion.php">Cerrar Sesion</a>
    </div>