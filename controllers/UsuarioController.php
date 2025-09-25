<?php  
class UsuarioController {
  public function login() {
    require_once 'views/Usuarios/login.php';
  }

  public function register() {
    require_once 'views/Usuarios/register.php';
  }
}


?>