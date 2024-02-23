<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promociones</title>
    <!--css de las promociones --> <style>
        .promocion {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .promocion h2 {
            margin-top: 0;
        }
        .promocion .boton-reclamar {
            float: right;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .promocion img {
            width: 500px;
            height: 500px;
            margin-right: 20px;}
            h1 {
            text-align: center;
        }
        .links a {
    display: inline-block;
    margin: 10px;
    padding: 10px 20px;
    background-color: #f0f0f0;
    color: #333;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.links a:hover {
    background-color: #ddd;
}
    </style>
</head>
<body>
<div class="links">
        <a href="index.php">Ir a la página inicial</a>
        <a href="reseñas.php">Ir a las reseñas</a>
        <a href="recuperarPassword.php">Reinicio de clave</a>
        <a href="citas.php">Citas</a>
        <a href="promociones.php">Promociones</a>
        </div>
     <!--promociones con descripcion y demas atributos  -->
<h1>Promociones por tiempo limitado!</h1>
    <div class="promocion">
    <img src=img/espuma.jpg alt="promo1">
        <h2>Espuma Nivea</h2>
        <p><strong>Descripción:</strong>Espuma de afeitar Nivea men para todo tipo de piel</p>
        <p><strong>Fecha de Inicio:</strong> 01-01-2024</p>
        <p><strong>Fecha de Fin:</strong> 01-03-2024</p>
        <p><strong>Descuento:</strong> 10%</p>
        <p><strong>Condiciones:</strong>Promocion aplica al pagar con tarjeta amex black</p>
        <button class="boton-reclamar">Reclamar Promoción</button>
    </div>

    <div class="promocion">
    <img src=img/navaja.jpg alt="promo2">
        <h2>Navaja de afeitar</h2>
        <p><strong>Descripción:</strong>Navaja de afeitar de marca generica</p>
        <p><strong>Fecha de Inicio:</strong> 01-01-2024</p>
        <p><strong>Fecha de Fin:</strong> 01-03-2024</p>
        <p><strong>Descuento:</strong> 20%</p>
        <p><strong>Condiciones:</strong> Promocion aplica al llevar 2 o mas articulos</p>
        <button class="boton-reclamar">Reclamar Promoción</button>
    </div>

</body>
</html>