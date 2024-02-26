<?php
require_once "include/templates/head.php";
?>



<link rel="stylesheet" href="css/productos.css">
<header>
    <div class="links">
        <a href="index.php">Ir a la página inicial</a>
        <a href="reseñas.php">Ir a las reseñas</a>
        <a href="empleados.php">ver los empleados</a>
        <a href="citas.php">hacer una Citas</a>
        <a href="promociones.php">Promociones</a>
    </div>
</header>

<body>
    <h1>Productos a la venta</h1>
    <table>
        <tr>
            <th> Producto</th>
            <th>Cantidad en Stock</th>
        </tr>
        <tr>
            <td>
                <span class="product-info">
                    <img src="img/gel.jpg" alt="Imagen Producto 1" width="150">
                    <span>GEL</span>
                </span>
            </td>
            <td>15</td>
        </tr>
        <tr>
            <td>
                <span class="product-info">
                    <img src="img/PEINE.jpg" alt="Imagen Producto 2" width="150">
                    <span>PEINE</span>
                </span>
            </td>
            <td>20</td>
        </tr>
        <tr>
            <td>
                <span class="product-info">
                    <img src="img/NAVAJA.jpg" alt="Imagen Producto 3" width="150">
                    <span>NAVAJA</span>
                </span>
            </td>
            <td>10</td>
        </tr>
        <tr>
            <td>
                <span class="product-info">
                    <img src="img/AFTER SHAVE.jpg" alt="Imagen Producto 4" width="150">
                    <span>AFTER SHAVE</span>
                </span>
            </td>
            <td>30</td>
        </tr>
        <tr>
            <td>
                <span class="product-info">
                    <img src="img/ESPUMA.jpg" alt="Imagen Producto 5" width="150">
                    <span>ESPUMA PARA AFEITAR</span>
                </span>
            </td>
            <td>25</td>
        </tr>
    </table>



    <style>
   
    </style>

<?php
include_once "include/templates/footer.php";
?>