<?php

require_once "conexion.php";

function getArray($sql) {
    try {
        $nConexion = Conectar();

        // formato de datos utf8
        if(mysqli_set_charset($nConexion, "utf8")){

            if(!$result = mysqli_query($nConexion, $sql)) die();  //cancela la ejecución

            $retorno = array();

            while ($row = mysqli_fetch_assoc($result)) { //Aqui decido utilizar mysqli_fetch_assoc para que solo me devuelva un arreglo asociativo en vez de que se represente 2 veces usando mysqli_fetch_array
                $retorno[] = $row;
            }
        }

    } catch (\Throwable $th) {
        echo $th;
    }finally{
        Desconectar($nConexion);
    }

    return $retorno;
}

$query = "SELECT * FROM servicios";

$ResultadoQuery = getArray($query);


echo json_encode($ResultadoQuery);



