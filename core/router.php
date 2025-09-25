<?php
// pasos para crear un router
// 1. leer parametros de la url (controlador/accion)
// 2. aplicar limpieza a esos parametros (caracteres raros)
// 3. construir el nombre de la clase del controlador y el archivo correspondiente
// 4. verificar que el archivo del controlador exista
// 5. verificar que la clase del controlador exista
// 6. crear el objeto del controlador
// 7. verificar que el metodo (accion) exista en ese controlador
// 8. ejecutar el metodo (accion) del controlador

// 1. Leer los parametros de la URL con las variables que definimos en index
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url)[0]; // sacar query string
$partes = array_filter(explode('/', $url));

$controller = !empty($partes[1]) ? ucfirst($partes[1]) : default_controller;
$action     = !empty($partes[2]) ? $partes[2] : default_action;

// 2. Validar con whitelist (nota *)
$allowedControllers = ['Producto', 'Pedido', 'Carrito', 'Usuario', 'Admin', 'Categoria'];

if (!in_array($controller, $allowedControllers)) {
    $controller = default_controller; // valor por defecto seguro
}

// 3. Armar clase y archivo del controlador
$controllerClass = ucfirst(strtolower($controller)) . 'Controller'; // "ProductoController"
$controllerFile  = __DIR__ . '/../controllers/' . $controllerClass . '.php';

      // 4. Validar que exista ese archivo
      if (!file_exists($controllerFile)) {
          http_response_code(404);
          echo "404 - Controlador <b>$controllerClass</b> no encontrado.";
          exit;
      } else {
          require_once $controllerFile;
      }

      // 5. Validar que exista esa clase 
      if (!class_exists($controllerClass)) {
          http_response_code(404);
          echo "404 - Clase <b>$controllerClass</b> no definida.";
          exit;
      }

// 6. Crear el objeto controlador
$controllerObj = new $controllerClass();

// 7. Validar y ejecutar la accion
if (!method_exists($controllerObj, $action)) {
    http_response_code(404);
    echo "404 - Accion <b>$action</b> no encontrada en $controllerClass";
    exit;
}

// 8. Ejecutar la acción
$controllerObj->$action();


// nota* se whipea los controladores porque alguien puede acceder a por ejemplo configController y si no esta en la lista blanca acceden y nos podrian ver datos de los usuarios que no queremos que sean publicos, esos se llaman agujeros de seguridad por donde podria entrar el hacker.