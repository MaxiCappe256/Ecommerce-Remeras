<?php

class Producto
{
    public $id;
    public $nombre;
    public $precio;
    public $stock;
    public $id_categoria;
    public $imagen;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // ---------- GETTERS ----------

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    // ---------- SETTERS ----------
    public function setId($id)
    {
        $this->id = (int)$id; // entero
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre); // protege SQL
    }

    public function setPrecio($precio)
    {
        $this->precio = (float)$precio; // convierte a número decimal
    }

    public function setStock($stock)
    {
        $this->stock = (int)$stock; // convierte a número entero
    }


    public function setIdCategoria($id_categoria)
    {
        $this->id_categoria = (int)$id_categoria; // entero (FK)
    }

    public function setImagen($imagen)
    {
        if ($imagen !== null) {
            $this->imagen = $this->db->real_escape_string($imagen);
        } else {
            $this->imagen = null; // lo guardamos como NULL en la BD
        }
    }

    // -------------------------------------

    public function getAll()
    {
        $sql = "SELECT * FROM productos ORDER BY id_producto DESC";

        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save()
    {
        $sql = "INSERT INTO productos (id_producto, nombre, precio, stock, id_categoria, imagen)
        VALUES (
            NULL,
            '{$this->nombre}',
            {$this->precio},
            {$this->stock},
            {$this->id_categoria},
            " . ($this->imagen ? "'{$this->imagen}'" : "NULL") . "
        )";


        $save = $this->db->query($sql);

        if (!$save) {
            var_dump($this->db->error);
        }

        return $save ? true : false;
    }

    public function eliminar()
    {
        // traemos la imagen y la eliminamos localmente
        $sql = "SELECT imagen FROM productos WHERE id_producto = {$this->id}";
        $consulta = $this->db->query($sql);
        $producto = $consulta->fetch_object();

        if (!empty($producto->imagen) && file_exists("assets/img/" . $producto->imagen)) {
            unlink("assets/img/" . $producto->imagen);
        }

        // eliminamos el producto de la base de datos
        $sql = "DELETE FROM productos WHERE id_producto = {$this->id}";
        $delete = $this->db->query($sql);

        if (!$delete) {
            var_dump($this->db->error);
            echo "<br>";
        }

        return $delete ? true : false;
    }

    public function update()
    {
        $sql = "UPDATE productos SET
                nombre = '{$this->nombre}',
                precio = {$this->precio},
                stock = {$this->stock},
                id_categoria = {$this->id_categoria}";

        // solo actualizar imagen si se subió una nueva
        if ($this->imagen !== null) {
            $sql .= ", imagen = '{$this->imagen}'";
        }

        $sql .= " WHERE id_producto = {$this->id}";

        $update = $this->db->query($sql);

        if (!$update) {
            var_dump($this->db->error);
        }

        return $update ? true : false;
    }

    public function getOne()
    {
        $sql = "SELECT *
                    FROM productos
                    WHERE id_producto = {$this->id} LIMIT 1    
                ";

        $consulta = $this->db->query($sql);

        if (!$consulta) {
            var_dump($this->db->error);
        }

        if ($consulta && $consulta->num_rows == 1) {
            return $consulta->fetch_object();
        }
    }

    public function getByCategoria()
    {
        $sql = "SELECT * FROM productos WHERE id_categoria = {$this->id_categoria}";

        $consult = $this->db->query($sql);

        if (!$consult) {
            var_dump($this->db->error);
        }

        return $consult;
    }

    public function getRandoms() {
        $sql = "SELECT * 
                    FROM productos 
                    ORDER BY RAND() 
                    LIMIT 6";

        $consulta = $this->db->query($sql);

        if(!$consulta) {
            var_dump($this->db->error);
        }

        return $consulta;
    }
}
