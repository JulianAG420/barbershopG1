<?php
require_once "DAL/ventas.php";


$query = "SELECT ventas.FechaHoraVenta, ventas.TotalVenta, ventas.MetodoPago, ventas.Descripcion, clientes.Nombre, clientes.Apellido FROM ventas
INNER JOIN clientes ON clientes.ClienteID = ventas.ClienteID"; 

$resultadosQuery = getArray($query);

//var_dump($resultadosQuery);

?>

    <h1>Ventas Registradas</h1>
    <table>
        <tr>
            <th> Fecha de la Venta </th>
            <th> Total de la Venta </th>
            <th> Metodo de Pago </th>
            <th> Descripcion </th>
            <th> Nombre del cliente </th>
        </tr>
        
        <?php foreach ($resultadosQuery as $resultado) : ?>
        <tr>
            <td><?php echo $resultado['FechaHoraVenta'];?></td>
            <td><?php echo $resultado['TotalVenta'];?></td>
            <td><?php echo $resultado['MetodoPago'];?></td>
            <td><?php echo $resultado['Descripcion'];?>₡</td>
            <td><?php echo $resultado['Nombre'] . ' ' . $resultado['Apellido'];?></td>
        </tr>
        <?php endforeach; ?>

    </table>
