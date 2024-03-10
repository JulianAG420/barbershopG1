<?php
require_once "conexion.php";

function getArray($sql)
{
    try {
        $nConexion = Conectar();

        // formato de datos utf8
        if (mysqli_set_charset($nConexion, "utf8")) {

            if (!$result = mysqli_query($nConexion, $sql)) die();  //cancela la ejecución

            $retorno = array();

            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }
    } catch (\Throwable $th) {
        echo $th;
    } finally {
        Desconectar($nConexion);
    }

    return $retorno;
}
