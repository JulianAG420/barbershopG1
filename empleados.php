<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estilistas</title>
<!-- css para seccionar a los estilistas y hacerlo mas estetico-->    <style>
    .estilista {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #B9B9B9;
            border-radius: 5px;
        }
        .estilista img {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }
        #horarios {
            margin: 0 auto; 
            padding: 20px;
            background-color: #B9B9B9;
            border-radius: 5px;
            text-align: center;
        }
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
    <!-- estilistas con sus atributos-->
    <h1>Estilistas y Horario de la Barbería</h1>
    <div class="estilista">
        <img src=img/estilista1.png alt="Foto de Estilista 1">
        <div>
        <p><strong>ID :</strong> 1</p>
            <p><strong>Nombre:</strong> Javier </p>
            <p><strong>Apellido:</strong> Obando</p>
            <p><strong>Especialidades:</strong> Gerente general del salon</p>
            <p><strong>Horario de Trabajo:</strong> 9:00am - 5:00pm</p>
            <p><strong>Contacto:</strong> jaoba@hotmail.com</p>
        </div>
    </div>
    <div class="estilista">
        <img src=img/estilista2.png " alt="Foto de Estilista 2">
        <div>
        <p><strong>ID :</strong> 2</p>
            <p><strong>Nombre:</strong> Melissa </p>
            <p><strong>Apellido:</strong> Briones</p>
            <p><strong>Especialidades:</strong> Estilista</p>
            <p><strong>Horario de Trabajo:</strong> 11:00am - 5:00pm</p>
            <p><strong>Contacto:</strong> mebi@hotmail.com</p>
        </div>
    </div>
    <div class="estilista">
        <img src=img/estilista3.png alt="Foto de Estilista 2">
        <div>
        <p><strong>ID :</strong> 3</p>
            <p><strong>Nombre:</strong> Liz </p>
            <p><strong>Apellido:</strong> Smith</p>
            <p><strong>Especialidades:</strong> Conserje</p>
            <p><strong>Horario de Trabajo:</strong> 9:00am - 5:00pm</p>
            <p><strong>Contacto:</strong> Lizmi@hotmail.com</p>
        </div>
    </div>
    <div class="estilista">
        <img src=img/estilista4.png alt="Foto de Estilista 2">
        <div>
        <p><strong>ID :</strong> 4</p>
            <p><strong>Nombre:</strong> Pablo </p>
            <p><strong>Apellido:</strong> Rodrigo</p>
            <p><strong>Especialidades:</strong> Cajero</p>
            <p><strong>Horario de Trabajo:</strong> 9:00am - 5:00pm</p>
            <p><strong>Contacto:</strong> paro@hotmail.com</p>
        </div>
        </div>
        <div class="estilista">
        <img src=img/estilista5.png alt="Foto de Estilista 2">
        <div>
        <p><strong>ID :</strong> 5</p>
            <p><strong>Nombre:</strong> Ken </p>
            <p><strong>Apellido:</strong> Smith</p>
            <p><strong>Especialidades:</strong> Estilista</p>
            <p><strong>Horario de Trabajo:</strong> 9:00am - 5:00pm</p>
            <p><strong>Contacto:</strong> kensm@hotmail.com</p>
        </div>
  
    </div>
    <!--seccion de horarios -->
    <div id="horarios">
        <h2>Nuestros Horarios</h2>
        <p>Lunes a Viernes: 9:00 - 20:00</p>
        <p>Sábado: 9:00 - 18:00</p>
        <p>Domingo: Cerrado</p>
    </div>
</body>
</html>