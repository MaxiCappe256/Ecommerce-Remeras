<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remeras</title>
  <link rel="stylesheet" href="<?= base_url ?>assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="container">
      <div class="logo">
        <img src="<?= base_url ?>assets/img_proyect/logo.png" alt="Imagen Logo">
      </div>

      <div>
        <ul class="links">
          <li><a href="<?= base_url ?>producto/index">Inicio</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle">Categorias ▾</a>
            <ul class="submenu">
              <?php
              require_once 'models/Categoria.php';
              $categoria = new Categoria();
              $categorias = $categoria->getAll();
              while ($cat = $categorias->fetch_object()):
              ?>
                <li>
                  <a href="<?= base_url ?>categoria/ver?id=<?= $cat->id_categoria ?>">
                    <?= $cat->nombre ?>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          </li>

          <li><a href="<?= base_url ?>carrito/index">Carrito</a></li>
          <li><a href="<?= base_url ?>usuario/login">Login</a></li>
          <li><a href="<?= base_url ?>usuario/logout">Cerrar Session</a></li>
          <li><a href="<?= base_url ?>producto/gestion">Panel Admin</a></li>
        </ul>
      </div>
    </nav>
  </header>