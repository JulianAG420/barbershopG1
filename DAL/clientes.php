<?php
    require_once "conexion.php";

    function IngresarClientes($bNombre, $bApellido, $bTelefono, $bCorreo, $bPassword){
    $retorno = false;

    try{
        $nConexion = Conectar();

        if(mysqli_set_charset($nConexion, "utf8")){
            $stmt = $nConexion->prepare("INSERT INTO clientes (nombre, apellido, telefono, email, pass_word) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $pNombre, $pApellido, $pTelefono, $pCorreo, $pPassword);

            // set parametros y luego ejecutar
            $pNombre = $bNombre;
            $pApellido = $bApellido;
            $pTelefono = $bTelefono;
            $pCorreo = $bCorreo;
            $pPassword = $bPassword;

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

    function recuperarPassword($bCorreo, $bPassword) {
        $retorno = false;
    
        try {
            $nConexion = Conectar();
    
            // formato de datos utf8
            if(mysqli_set_charset($nConexion, "utf8")){
                $stmt = $nConexion->prepare("UPDATE clientes SET pass_word = ? WHERE email = ?");
                $stmt->bind_param("ss", $pPassword, $pCorreo);
    
                // set parametros y luego ejecutar
                $pPassword = $bPassword;
                $pCorreo = $bCorreo;
    
                if ($stmt->execute()){
                    $retorno = true;
                }
            }
    
        } catch (\Throwable $th) {
            //almacenar información en bitacora $th
            //throw $th;
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
    
    function getObject($sql) {
        try {
            $nConexion = Conectar();
    
            // formato de datos utf8
            if(mysqli_set_charset($nConexion, "utf8")){
    
                if(!$result = mysqli_query($nConexion, $sql)) die();  //cancela la ejecución
    
                $retorno = null;
    
                while ($row = mysqli_fetch_array($result)) {
                    $retorno = $row;
                }
            }
    
        } catch (\Throwable $th) {
            echo $th;
        }finally{
            Desconectar($nConexion);
        }
    
        return $retorno;
    }

?>