<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Esto es para asegurarse de que el script no intenta servir un archivo 
// cuando una solicitud para ese archivo existe en el sistema de archivos
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
