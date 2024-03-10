<?php
require_once "include/templates/head.php"
?>
<body>
    
<h1>Formulario de Reseñas</h1>

<main class="contenedor">

    <form method="POST">
        <?php require_once "include/templates/cuerpoEscribirResena.php"; ?>
        <input type="submit" value="Enviar Reseña">
    </form>
</main>

<?php
include "include/templates/footer.php"
?>