<?php 
// configuraciones generales
define("base_url", "http://localhost:3000/");
define("default_controller", "Producto");
define("default_action", "index");

// Conexion a la base de datos
require_once 'config/Database.php';

// Cargar el router
require_once 'core/router.php';

?>
