<?php 
require_once 'models/Producto.php';
require_once 'core/helpers.php';

class CategoriaController {

  public function ver()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $producto = new Producto();
      $producto->setIdCategoria($id);
      $productos = $producto->getByCategoria();

      require_once 'views/Productos/categoria.php';
    }
  }
}


?>