<h1>Agregar Producto</h1>

<form action="<?= base_url ?>producto/guardar" method="POST"  enctype="multipart/form-data">
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" require>

  <label for="precio">Precio</label>
  <input type="text" name="precio" require>

  <label for="stock">Stock</label>
  <input type="text" name="stock" require>

  <label for="categoria">Categorias</label>
  <select name="categoria" id="categoria">
    <?php while ($cat = $categorias->fetch_object()): ?>
      <option value="<?= $cat->id_categoria ?>">
        <?= $cat->nombre ?>
      </option>
    <?php endwhile; ?>
  </select>

  <label for="imagen">Imagen</label>
  <input type="file" name="imagen" accept="image/*">

  <input type="submit" value="Agregar">
</form>
<br>
<a href="<?= base_url ?>producto/index">Volver</a>