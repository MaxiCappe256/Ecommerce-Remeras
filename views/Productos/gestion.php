<?php require_once 'views/layout/header.php'; ?>
<main class="container dashboard">
  <h1>Gestion Productos</h1>
  <a class="btn" href="<?= base_url ?>producto/crear">Agregar Producto</a>

  <?php Utils::deleteSession('save'); ?>
  <?php Utils::deleteSession('delete'); ?>
  <?php Utils::deleteSession('update'); ?>

  <table class="tabla">
    <tr>
      <td class="titulo">Nombre</td>
      <td class="titulo">Precio</td>
      <td class="titulo">Stock</td>
      <td class="titulo">Imagen</td>
      <td class="titulo" >Accion</td>
    </tr>

    <?php while ($fila = $productos->fetch_object()): ?>
      <tr>
        <td class="fila"><?= $fila->nombre; ?></td>
        <td class="fila">$<?= $fila->precio; ?></td>
        <td class="fila"><?= $fila->stock; ?></td>
        <td> <?php if (!empty($fila->imagen)): ?>
            <img src="<?= base_url ?>assets/img/<?= $fila->imagen ?>" width="80" alt="imagen_producto">
          <?php else: ?>
            <span>Sin Imagen</span>
          <?php endif; ?>
        </td>
        <td>
          <a class="btn-eliminar" href="<?= base_url ?>producto/eliminar?id=<?= $fila->id_producto ?>">Eliminar</a>
          <a class="btn-editar" href="<?= base_url ?>producto/editar?id=<?= $fila->id_producto ?>">Editar</a>
        </td>

        </td>

        </td>
      </tr>


    <?php endwhile; ?>

  </table>

</main>
<?php require_once 'views/layout/footer.php'; ?>