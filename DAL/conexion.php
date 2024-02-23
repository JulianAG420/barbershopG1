<?php
    function Conectar(){
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "SistemaBarberia";

        //Apertura de la conexion mysqli
        $conexion = mysqli_connect($server, $user, $password, $database);

        //Verificacion de la conexion
        if(!$conexion){
            echo "Error al intentar establecer la conexion con la base de datos" . mysqli_connect_error();
        }

        return $conexion;
    }

    function Desconectar($conexion) {
        mysqli_close($conexion);
    }
?>