<?php
require_once "DAL/empleados.php";


$query = "SELECT productos.Nombre, productos.Descripcion, productos.PrecioVenta, productos.Imagen, inventario.CantidadStock FROM productos 
INNER JOIN inventario ON productos.ProductoID = inventario.ProductoID"; 

$resultadosQuery = getArray($query);

//var_dump($resultadosQuery);

?>

<body>
    <div class="links">
        <a href="index.php">Menu Principal</a>
        <a href="empleados.php">Estilistas</a>
        <a href="resenas.php">Reseñas</a>
        <a href="citas.php">Citas</a>
        <a href="promociones.php">Promociones</a>
    </div>

    <h1>Productos a la Venta en la Tienda</h1>
    <table>
        <tr>
            <th> Producto</th>
            <th> Descripcion</th>
            <th> Precio</th>
            <th> Cantidad en Stock </th>
        </tr>
        
        <?php foreach ($resultadosQuery as $resultado) : ?>
        <tr>
            <td>
                <span class="product-info">
                <img src="../../img/<?php echo $resultado['Imagen'];?>" alt="Imagen Producto 1" width="150">
                    <span><?php echo $resultado['Nombre'];?></span>
                </span>
            </td>
            <td><?php echo $resultado['Descripcion'];?></td>
            <td><?php echo $resultado['PrecioVenta'];?>₡</td>
            <td><?php echo $resultado['CantidadStock'];?></td>
        </tr>
        <?php endforeach; ?>

    </table>
