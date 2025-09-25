<h1>Editar Producto</h1>

<form action="<?= base_url ?>producto/actualizar" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $productoEdit->id_producto ?>">

  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" value="<?= $productoEdit->nombre ?>" require>

  <label for="precio">Precio</label>
  <input type="text" name="precio" value="<?= $productoEdit->precio ?>" require>

  <label for="stock">Stock</label>
  <input type="text" name="stock" value="<?= $productoEdit->stock ?>" require>

  <label for="categoria">Categorias</label>
  <select name="categoria" id="categoria">
    <?php while ($cat = $categorias->fetch_object()): ?>
      <option value="<?= $cat->id_categoria ?>"
        <?= $cat->id_categoria == $productoEdit->id_categoria ? 'selected' : '' ?>>
        <?= $cat->nombre ?>
      </option>
    <?php endwhile; ?>
  </select>

  <label for="imagen">Imagen</label>
  <?php if (!empty($productoEdit->imagen)): ?>
    <img src="<?= base_url ?>assets/img/<?= $productoEdit->imagen ?>" width="100" alt="imagen producto">
    <br>
  <?php endif; ?>
  <input type="file" name="imagen" accept="image/*">

  <input type="submit" value="Actualizar">
</form>
<br>
<a href="<?= base_url ?>producto/index">Volver</a>