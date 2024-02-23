<?php
function Debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function Sanitizar($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
