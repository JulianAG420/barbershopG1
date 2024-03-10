<?php
    require_once "conexion.php";

    function IngresarResena($bClienteId, $bFecha, $bEstilistaId, $bCalificacion, $bComentario, $bTitulo){
        $retorno = false;
    
        try{
            $nConexion = Conectar();
    
            if(mysqli_set_charset($nConexion, "utf8")){
                $stmt = $nConexion->prepare("INSERT INTO comentariosvaloraciones (ClienteId, Fecha, EstilistaId, Calificacion, Comentario, Titulo) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $pClienteId, $pFecha, $pEstilistaId, $pCalificacion, $pComentario, $pTitulo);
    
                // set parametros y luego ejecutar
                $bClienteId = $pClienteId;
                $bFecha = $pFecha;
                $bEstilistaId = $pEstilistaId;
                $bCalificacion = $pCalificacion;
                $bComentario = $pComentario;
                $bTitulo = $pTitulo;
                
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
    
    function getArray($sql) {
        try {
            $nConexion = Conectar();
    
            // formato de datos utf8
            if(mysqli_set_charset($nConexion, "utf8")){
    
                if(!$result = mysqli_query($nConexion, $sql)) die();  //cancela la ejecución
    
                $retorno = array();
    
                while ($row = mysqli_fetch_array($result)) {
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