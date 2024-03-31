<?php
require_once "conexion.php";

function IngresarCitas($bClienteId, $bFecha, $bHora)
{
    $retorno = false;
    $insertedId = null; // Variable para almacenar el ID del registro insertado

    try {
        $nConexion = Conectar();

        if (mysqli_set_charset($nConexion, "utf8")) {
            $stmt = $nConexion->prepare("INSERT INTO citas (ClienteId, Fecha, Hora) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $pClienteId, $pFecha, $pHora);

            // Establecer parámetros y luego ejecutar la consulta
            $pClienteId = $bClienteId;
            $pFecha = $bFecha;
            $pHora = $bHora;

            if ($stmt->execute()) {
                // Si la inserción fue exitosa, obtener el ID del registro insertado
                $idInsertado = $nConexion->insert_id;
                $retorno = true;
            }
        }
    } catch (\Throwable $th) {
        echo $th;
    } finally {
        Desconectar($nConexion);
    }

    // Retornar un array con el resultado y el ID del registro insertado
    return $respuesta  = [
        'resultado' => $retorno,
        'citaId' => $idInsertado
    ] ;
}


function IngresarCitasServicios($bServicioId, $bCitaId)
{
    $retorno = false;

    try {
        $nConexion = Conectar();

        if (mysqli_set_charset($nConexion, "utf8")) {
            $stmt = $nConexion->prepare("INSERT INTO citasservicios (servicioId, citaId) VALUES (?, ?)");
            $stmt->bind_param("ss", $pServicioId, $pCitaId);

            // set parametros y luego ejecutar
            $pServicioId = $bServicioId;
            $pCitaId = $bCitaId;

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

    // Verificar si la inserción fue exitosa
    if ($cita['resultado']) {
        // Obtener el valor de citaId
        $citaId = $cita['citaId'];
        //Almacena la cita y los servicios (ID)
        $idServicios = explode(',', $_POST['servicios']);
    
        foreach ($idServicios as $idServicio) {
            $citasServicios = IngresarCitasServicios($idServicio, $citaId);
        }

    }


    echo json_encode($cita);

