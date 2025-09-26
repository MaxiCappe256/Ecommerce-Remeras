<?php require_once 'views/layout/header.php'; ?>

<main class=" register container">

  <h1>Registrate</h1>

  <form class="form second-form" action="" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" placeholder="Tu Nombre...">

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" placeholder="Tu Apellido...">

    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="Tu Email...">

    <label for="password">Contraseña:</label>
    <input type="password" name="password" placeholder="Tu Contraseña...">

    <label for="confirm">Confirmar Contraseña:</label>
    <input type="confirm" name="confirm" placeholder="Confirmar Contraseña...">

    <input class="btn" type="submit" value="Ingresar">

    <a href="<?= base_url ?>usuario/login">¿Ya tienes cuenta? Inicia Sessión</a>

  </form>

</main>



<?php require_once 'views/layout/footer.php'; ?>