<?php require_once 'views/layout/header.php'; ?>

<main class="destacados container section">
  <h1>Destacados</h1>

  <div class="grid">
    <?php while ($pro = $productos->fetch_object()): ?>

      <div class="producto">
        <div class="container-img">
          <img src="<?=base_url?>assets/img/<?=$pro->imagen?>" alt="<?=$pro->nombre?>">
        </div>

        <div class="descripcion">
          <h3 class="precio">$<?=round($pro->precio)?></h3>
          <h4 class="nombre"><?=$pro->nombre?></h4>
          <a href="#" class="btn">Agregar al Carrito</a>
        </div>
      </div>

    <?php endwhile; ?>
  </div>
</main>

<?php require_once 'views/layout/footer.php'; ?>