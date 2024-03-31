<?php
require_once "DAL/conexion.php";
function getObject($sql)
{
    try {
        $nConexion = Conectar();

        // formato de datos utf8
        if (mysqli_set_charset($nConexion, "utf8")) {

            if (!$result = mysqli_query($nConexion, $sql)) die();  //cancela la ejecución

            $retorno = null;

            while ($row = mysqli_fetch_assoc($result)) {
                $retorno = $row;
            }
        }
    } catch (\Throwable $th) {
        echo $th;
    } finally {
        Desconectar($nConexion);
    }

    return $retorno;
}

session_start();
$id = $_SESSION['id'];

$query = "SELECT nombre, apellido FROM Clientes WHERE ClienteID = $id";
$resultadosQuery = getObject($query);

//var_dump($resultadosQuery);

?>
<div class="links">
    <a href="index.php">Menu Principal</a>
    <a href="empleados.php">Estilistas</a>
    <a href="resenas.php">Reseñas</a>
    <a href="promociones.php">Promociones</a>
    <a href="productos.php">Productos</a>
</div>

<h1 class="nombre-pagina">Crear nueva cita</h1>

<h2 class="descripcion-pagina" style="color: white;">Elige tus servicios y coloca tus datos</h2>


<div id="app">
    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Tus datos y cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>
</div>

<div id="id">
    <div id="paso-1" class="seccion">
        <h2 style="color: white;">Servicios</h2>
        <p class="text-center" style="color: white;">Elige tus servicios a continuacion</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>

    <div id="paso-2" class="seccion">
        <h2 style="color: white;">Tus datos y cita</h2>
        <p class="text-center" style="color: white;">Coloca tus datos y fecha de tu cita</p>

        <form class="formulario">
            <div class="campo">

                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Tu nombre" value="<?php echo $resultadosQuery['nombre'] . " " . $resultadosQuery['apellido'] ?>" disabled>

            </div>

            <div class="campo">

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">

            </div>

            <div class="campo">

                <label for="hora">Hora</label>
                <input type="time" id="hora">

            </div>

            <input type="hidden" id="idUsuario" value="<?php echo $id; ?>">
        </form>
    </div>

    <div id="paso-3" class="seccion contenido-resumen">
        <h2 style="color: white;">Resumen</h2>
        <p class="text-center" style="color: white;">Verifica que la informacion este correcta</p>
    </div>

    <div class="paginacion">

        <button class="boton" id="anterior">&laquo; Anterior</button>
        <button class="boton" id="siguiente">Siguiente &raquo;</button>

    </div>


</div>