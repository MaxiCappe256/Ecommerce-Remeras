<?php require_once 'views/layout/header.php'; ?>
<div class="productos_categoria">
  <?php while ($pro = $productos->fetch_object()): ?>
    <div class="productos_categoria">
      <div class="imagen_contenedor">
        <img src="<?=base_url?>assets/img/<?=$pro->imagen?>" alt="Imagen Producto">
      </div>

      <div class="descripcion">
        <h3><?=$pro->nombre?></h3>
        <p><?=$pro->precio?></p>
        <p><?=$pro->stock?></p>
      </div>
    </div>
  <?php endwhile; ?>
</div>
<?php require_once 'views/layout/footer.php'; ?>