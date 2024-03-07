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
        <h1>Agendar Cita</h1>
        <form action="#" method="post">
            <label for="fecha">Día de Reserva:</label><br>
            <input type="date" id="fecha" name="fecha"><br><br>
            <label for="hora">Hora de Reserva:</label><br>
            <input type="time" id="hora" name="hora"><br><br>
            <button class="boton" type="submit">Agendar</button>
        </form>
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