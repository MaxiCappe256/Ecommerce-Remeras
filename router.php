<?php
// Si el archivo existe físicamente (css, js, imágenes, etc.), lo sirve tal cual
$path = __DIR__ . $_SERVER['REQUEST_URI'];

if ($path !== __DIR__ . '/' && file_exists($path)) {
    return false;
}

// Si no existe, o es la raíz "/", todo pasa por index.php
require_once __DIR__ . '/index.php';