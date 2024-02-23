<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>
  <!--css de las citas -->   <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #banner {
            width: 100%;
            height: 200px;
            background-image: url('img/bannercitas.png');
            background-size: cover;
        }
        #agendar-cita {
            padding: 20px;
        }
        .confirmar-cita {
            margin-top: 50px;
            text-align: center;
        }
        .confirmar-cita h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .confirmar-cita button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #otras-fechas-disponibles {
            margin-top: 50px;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .fecha-disponible {
            margin-bottom: 20px;
            text-align: center;
        }
        .fecha-disponible img {
            width: 200px;
            height: 200px;
            margin-bottom: 10px;
        }

        h2{
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
     <!--banner y parte superior de las citas  -->
    <div id="banner"></div>
    <section id="agendar-cita">
        <h2>Agendar Cita</h2>
        <form action="#" method="post">
            <label for="fecha">Día de Reserva:</label><br>
            <input type="date" id="fecha" name="fecha"><br><br>
            <label for="hora">Hora de Reserva:</label><br>
            <input type="time" id="hora" name="hora"><br><br>
            <button type="submit">Agendar</button>
        </form>
    </section>
 <!--seccion de confirmar las citas-->
    <section class="confirmar-cita">
        <h2>Confirmar Cita</h2>
        <button>Confirmar</button>
    </section>
 <!--seccion de otras fechas disponibbles  -->
    <section id="otras-fechas-disponibles">
        <h2>Otras Fechas Disponibles</h2>
        <div class="fecha-disponible">
            <img src="img/cita.png" alt="Imagen Fecha Disponible">
            <p>Fecha y Hora: 2024-03-01 09:00</p>
        </div>
        <div class="fecha-disponible">
            <img src="img/cita.png" alt="Imagen Fecha Disponible">
            <p>Fecha y Hora: 2024-03-02 10:00</p>
        </div>
    </section>
</body>
</html>