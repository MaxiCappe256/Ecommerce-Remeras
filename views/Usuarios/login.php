<?php require_once 'views/layout/header.php'; ?>


<main class="section container">
  <h1>Inicia Sessión</h1>
  <form class="form" action="" method="POST">
    <label for="email">Email:</label>
    <input type="text" name="email" placeholder="Tu Email..." require>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" placeholder="Tu Contraseña..." require>

    <input class="btn" type="submit" value="Ingresar">

    <a href="<?=base_url?>usuario/register">¿Aún no tenes cuenta? Hazte una</a>
  </form>

</main>

<?php require_once 'views/layout/footer.php'; ?>