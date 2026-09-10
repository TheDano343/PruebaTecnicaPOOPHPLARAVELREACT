 <?php

class BaseDeDatos{

    protected $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "usuariotarea");

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
    
}



?> 