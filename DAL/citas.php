<?php
require_once "conexion.php";

function IngresarCitas($bClienteId, $bFecha, $bHora)
{
    $retorno = false;

    try {
        $nConexion = Conectar();

        if (mysqli_set_charset($nConexion, "utf8")) {
            $stmt = $nConexion->prepare("INSERT INTO citas (ClienteId, Fecha, Hora) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $pClienteId, $pFecha, $pHora);

            // set parametros y luego ejecutar
            $pClienteId = $bClienteId;
            $pFecha = $bFecha;
            $pHora = $bHora;

            if ($stmt->execute()) {
                $retorno = true;
            }
        }
    } catch (\Throwable $th) {
        echo $th;
    } finally {
        Desconectar($nConexion);
    }
    return $retorno;
}

    // Obtener los valores de $_POST
    $clienteId = $_POST['ClienteId'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Llamar a la función IngresarCitas() con los valores correctos
    $cita = IngresarCitas($clienteId, $fecha, $hora);

    echo json_encode($cita);

