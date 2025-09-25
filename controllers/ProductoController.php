<?php

require_once 'models/Producto.php';
require_once 'core/helpers.php';

class ProductoController
{
  public function index() {
    $producto = new Producto();
    $productos = $producto->getRandoms();
    
    

    require_once 'views/Productos/index.php';
  }
  public function gestion()
  {
    // Utils::isAdmin();

    $producto = new Producto();
    $productos = $producto->getAll();

    require_once 'views/Productos/gestion.php';
  }

  public function crear()
  {
    require_once 'models/Categoria.php';

    $categoria = new Categoria();
    $categorias = $categoria->getAll();

    require_once 'views/Productos/crear.php';
  }

  public function guardar()
  {
    if (isset($_POST)) {
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
      $precio = isset($_POST['precio']) ? $_POST['precio'] : null;
      $stock = isset($_POST['stock']) ? $_POST['stock'] : null;
      $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
      $imagen = null;

      if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $nombreArchivo = time() . "_" . $_FILES['imagen']['name']; // 1238123921_chaqueta.jpg
        $rutaDestino = "assets/img/" . $nombreArchivo; // assets/img/123123213_chaqueta.jpg

        if (!is_dir("assets/img")) {
          mkdir("assets/img", 0777, true);
        }

        move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);

        $imagen = $nombreArchivo; // 1238123921_chaqueta.jpg
      }

      if ($nombre !== null && $precio !== null && $stock !== null && $categoria !== null) {
        $producto = new Producto();

        $producto->setNombre($nombre);
        $producto->setPrecio($precio);
        $producto->setStock($stock);
        $producto->setIdCategoria($categoria);
        if ($imagen) {
          $producto->setImagen($imagen);
        }


        $save = $producto->save();

        if ($save) {
          $_SESSION['save'] = "complete";
        } else {
          $_SESSION['save'] = "failed";
        }
      } else {
        $_SESSION['save'] = "failed";
      }
    } else {
      $_SESSION['save'] = "failed";
    }

    header("Location:" . base_url . "producto/index");
  }

  public function eliminar()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $producto = new Producto();
      $producto->setId($id);
      $result = $producto->eliminar();


      if ($result) {
        $_SESSION['delete'] = "complete";
      } else {
        $_SESSION['delete'] = "failed";
      }
    } else {
      $_SESSION['delete'] = "failed";
    }

    header("Location:" . base_url . "producto/index");
  }

  public function editar()
  {
    if (isset($_GET['id'])) {

      $id = $_GET['id'];

      $producto = new Producto();
      $producto->setId($id);
      $productoEdit = $producto->getOne();

      require_once 'models/Categoria.php';
      $categoria = new Categoria();
      $categorias = $categoria->getAll();

      require_once 'views/Productos/editar.php';
    }
  }

  public function actualizar()
  {
    if (isset($_POST)) {
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $precio = $_POST['precio'];
      $stock = $_POST['stock'];
      $categoria = $_POST['categoria'];
      $imagen = null;

      $producto = new Producto();
      $producto->setId($id);
      $productoActual = $producto->getOne();

      $imagen = $productoActual->imagen;

      if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $nombreArchivo = time() . "_" . $_FILES['imagen']['name'];
        $rutaDestino = "assets/img/" . $nombreArchivo;

        if (!is_dir("assets/img")) {
          mkdir("assets/img", 0777, true);
        }

        // movemos el archivo temporal a la ruta de destino
        move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);

        // verifica que haya una imagen guardada en la BD
        // file_exist y si existe ese archivo en la carpeta
        // si se cumple borra la imagen antes de cargar la nueva
        if (!empty($productoActual->imagen) && file_exists("assets/img/" . $productoActual->imagen)) {
          // borramos
          unlink("assets/img/" . $productoActual->imagen);
        }

        $imagen = $nombreArchivo;
      }

      if ($id !== null && $nombre !== null  && $precio !== null  && $stock !== null  && $categoria !== null) {
        $producto = new Producto();
        $producto->setId($id);
        $producto->setNombre($nombre);
        $producto->setPrecio($precio);
        $producto->setStock($stock);
        $producto->setIdCategoria($categoria);

        $update = $producto->update();

        $_SESSION['update'] = $update ? "complete" : "failed";
      } else {
        $_SESSION['update'] = "failed";
      }
    }

    header("Location:" . base_url . "producto/index");
  }


}
