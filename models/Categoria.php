<?php 

class Categoria {
  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  public function getAll() {
    $sql = "SELECT * FROM categorias ORDER BY nombre ASC";

    $categorias = $this->db->query($sql);

    return $categorias;
  }
}

?>