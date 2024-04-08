<?php
    require_once "conexion.php";
    
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


    //Administrador

    function ActualizarProducto($pProduct, $pnuevo_inventario) {
        $retorno = false;
    
        try {
            $oConexion = Conectar();
    
            // formato de datos utf8
            if(mysqli_set_charset($oConexion, "utf8")){
                $stmt = $oConexion->prepare("update inventario set CantidadStock = ? where ProductoID = ?");
                $stmt->bind_param("ss", $inuevo_inventario, $iProduct);
    
                $inuevo_inventario = $pnuevo_inventario;
                $iProduct = $pProduct;
    
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

    function ActualizarPrecio($pProduct, $pnuevo_precio) {
        $retorno = false;
    
        try {
            $oConexion = Conectar();
    
            // formato de datos utf8
            if(mysqli_set_charset($oConexion, "utf8")){
                $stmt = $oConexion->prepare("update productos set PrecioVenta = ? where ProductoID = ?");
                $stmt->bind_param("ds", $inuevo_precio, $iProduct);
    
                $inuevo_precio = $pnuevo_precio;
                $iProduct = $pProduct;
    
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



    function ActualizarEstilista($pnombre, $papellido, $pespecialidades, $phorario, $pcontacto, $pimagen, $pid) {
        $retorno = false;
    
        try {
            $oConexion = Conectar();
    
            // formato de datos utf8
            if(mysqli_set_charset($oConexion, "utf8")){      
                $stmt = $oConexion->prepare("update estilistas set Nombre = ?, Apellido = ?, Especialidades = ?, HorarioTrabajo = ?, Contacto = ?, imagen = ? where EstilistaID = ?");

                $stmt->bind_param("ssssssi", $inombre, $iapellido, $iespecialidades, $ihorario, $icontacto, $iimagen, $iid);
                
                $inombre = $pnombre;
                $iapellido = $papellido;
                $iespecialidades = $pespecialidades;
                $ihorario = $phorario;
                $icontacto = $pcontacto;
                $iimagen = $pimagen;
                $iid = $pid;

              
    
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


    
    function AgregarEstilista($pnombre, $papellido, $pespecialidades, $phorario, $pcontacto, $pimagen) {
        $retorno = false;
    
        try {
            $oConexion = Conectar();
    
            // formato de datos utf8
            if(mysqli_set_charset($oConexion, "utf8")){   
                $stmt = $oConexion->prepare("insert into estilistas (Nombre, Apellido, Especialidades, HorarioTrabajo, Contacto, imagen) values (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $inombre, $iapellido, $iespecialidades, $ihorario, $icontacto, $iimagen);
                

                
                $inombre = $pnombre;
                $iapellido = $papellido;
                $iespecialidades = $pespecialidades;
                $ihorario = $phorario;
                $icontacto = $pcontacto;
                $iimagen = $pimagen;

              
    
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


    function RegistrarVenta($pClienteNombre, $pPago, $pFecha, $pVenta, $pDescripcion) {
        
        $retorno = false;
    
        try {
            $oConexion = Conectar();
    
            // formato de datos utf8
            if(mysqli_set_charset($oConexion, "utf8")){   
                $stmt = $oConexion->prepare("insert into ventas (FechaHoraVenta, TotalVenta, MetodoPago, Descripcion, ClienteID) values (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssi", $iFecha, $iVenta, $iPago, $iDescripcion, $iClienteNombre);
                

                $iClienteNombre = $pClienteNombre;
                $iPago = $pPago;
                $iFecha = $pFecha;
                $iVenta = $pVenta;
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


    function EliminarEstilista($pId) {
        $retorno = false;
    
        try {
            $oConexion = Conectar();
    
            // formato de datos utf8
            if(mysqli_set_charset($oConexion, "utf8")){
                $stmt = $oConexion->prepare("delete from estilistas where EstilistaID = ?");
                $stmt->bind_param("s", $iId);
    
                // set parametros y luego ejecutar
                $iId = $pId;
    
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