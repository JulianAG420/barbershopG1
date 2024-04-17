<?php

require_once "conexion.php";

function getArray($sql) {
    try {
        $nConexion = Conectar();

        // formato de datos utf8
        if(mysqli_set_charset($nConexion, "utf8")){

            if(!$result = mysqli_query($nConexion, $sql)) die();  //cancela la ejecución

            $retorno = array();

            while ($row = mysqli_fetch_assoc($result)) {
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

function AgregarCategoria($pDescripcion) {
    $retorno = false;

    try {
        $oConexion = Conectar();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){   
            $stmt = $oConexion->prepare("insert into categorias (NombreCategoria) values (?)");
            $stmt->bind_param("s", $iDescripcion);
            

            
            $iDescripcion = $pDescripcion;

            if ($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        echo $th;
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}