<?php
require_once "conexion.php";

function ingresarServicios($bNombreServicio, $bprecio){
$retorno = false;

try{
    $nConexion = Conectar();

    if(mysqli_set_charset($nConexion, "utf8")){
        $stmt = $nConexion->prepare("INSERT INTO servicios (Nombre, Precio) VALUES (?, ?)");
        $stmt->bind_param("ss", $pNombreServicio, $pPrecio);

        // set parametros y luego ejecutar
        $pNombreServicio = $bNombreServicio;
        $pPrecio = $bprecio;

        if ($stmt->execute()){
            $retorno = true;
        }
    }

}catch(\Throwable $th){
    echo $th;
}finally{
    Desconectar($nConexion);
}
return $retorno;
}

function actualizarServicio($bNombreServicio, $bprecio, $bId) {
    $retorno = false;

    try {
        $oConexion = Conectar();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){      
            $stmt = $oConexion->prepare("UPDATE servicios SET Nombre = ?, Precio = ? WHERE ServicioID = ?");

            $stmt->bind_param("sss", $PNombreServicio, $Pprecio, $pId);
            
            $PNombreServicio = $bNombreServicio;
            $Pprecio = $bprecio;
            $pId = $bId;
            
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

function eliminarServicio($bId) {
    $retorno = false;

    try {
        $oConexion = Conectar();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("DELETE FROM servicios WHERE ServicioID = ?");
            $stmt->bind_param("s", $pId);

            // set parametros y luego ejecutar
            $pId = $bId;

            if ($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        //almacenar información en bitacora $th
        //throw $th;
        echo $th;
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}

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