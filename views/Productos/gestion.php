<?php  require_once 'views/layout/header.php'; ?>
<h1>DASHBOARD</h1>
<a href="<?= base_url ?>producto/crear">Agregar Producto</a>

<?php Utils::deleteSession('save'); ?>
<?php Utils::deleteSession('delete'); ?>
<?php Utils::deleteSession('update'); ?>

<table>
  <tr>
    <td>Nombre</td>
    <td>Precio</td>
    <td>Stock</td>
    <td>Imagen</td>
    <td>Accion</td>
  </tr>

  <?php while ($fila = $productos->fetch_object()): ?>
    <tr>
      <td><?= $fila->nombre; ?></td>
      <td>$<?= $fila->precio; ?></td>
      <td><?= $fila->stock; ?></td>
      <td> <?php if (!empty($fila->imagen)): ?>
          <img src="<?= base_url ?>assets/img/<?= $fila->imagen ?>" width="80" alt="imagen_producto">
        <?php else: ?>
          <span>Sin Imagen</span>
        <?php endif; ?>
      </td>
      <td>
        <a href="<?= base_url ?>producto/eliminar?id=<?= $fila->id_producto ?>">Eliminar</a>
        <a href="<?= base_url ?>producto/editar?id=<?= $fila->id_producto ?>">Editar</a>
      </td>

      </td>

      </td>
    </tr>


  <?php endwhile; ?>

</table>
<?php require_once 'views/layout/footer.php'; ?>