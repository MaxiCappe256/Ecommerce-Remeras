<?php

class Utils
{


  public static function isAdmin()
  {
    if (!isset($_SESSION['rol']) && $_SESSION['rol'] !== 'admin') {
      header("Location:" . base_url);
      exit;
    }

    return true;
  }

  public static function deleteSession($name)
  {
    if (isset($_SESSION[$name])) {
      $_SESSION[$name] = null;
      unset($_SESSION[$name]);
    }

    return $name;
  }
}
