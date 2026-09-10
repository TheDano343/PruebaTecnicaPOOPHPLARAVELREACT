<?php

require '../DB/BaseDeDatos.php';


class Task extends BaseDeDatos
{    
    public int $id;
    public string $title;
    public string $descripcion;
    public string $completed;
    public int $usuario_id;


    // getters
    public function obtencionId()
    {
        return $this->id;
    }

    public function obtenerTitle()
    {
        return $this->title;
    }

    public function obtenerDescripcion()
    {
        return $this->descripcion;
    }

    public function obtenerCompleted()
    {
        return $this->completed;
    }

    public function obtenerUsuariosId()
    {
        return $this->usuario_id;
    }


    // setters
    public function colocarTitle($title)
    {
        return $this->title = $title;
    }

    public function colocarDescripcion($descripcion)
    {
        return $this->descripcion = $descripcion;
    }

    public function colocarCompleted($completed)
    {
        return $this->completed = $completed;
    }

    public function colocarUsuariosId($usuario_id)
    {
        return $this->usuario_id = $usuario_id;
    }

    public function __construct($title = '', $descripcion = '', $completed = '',  $usuario_id = '0')
    {
        parent::__construct();
        $this->title = $title;
        $this->descripcion = $descripcion;
        $this->completed = $completed;
        $this->usuario_id = $usuario_id;
    }

    public function obtenerTasks()
    {
        $tasks = "SELECT * FROM tasks t INNER JOIN usuarios u ON t.usuario_id = u.id";
        $obtencionCosultas = $this->conexion->query($tasks);
        return $obtencionCosultas->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerUsuarios()
    {
        $usuarios = "SELECT * FROM usuarios";
        $obtencionCosultasUsuarios = $this->conexion->query($usuarios);
        return $obtencionCosultasUsuarios->fetch_all(MYSQLI_ASSOC);
    }

    public function crear()
    {
        $insertar = "INSERT INTO tasks(title,descripcion,completed,usuario_id) VALUES(?,?,?,?)";
        $stmt = $this->conexion->prepare($insertar);
        $stmt->bind_param("ssii",$this->title,$this->descripcion,$this->completed,$this->usuario_id);
        return $stmt->execute();
    }

    public function obtenerId($id) {
    $sql = "SELECT * FROM tasks WHERE id = ?"; 
    $stmt = $this->conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}


    public function actualizar($id)
    {
        $actualizar = "UPDATE tasks SET title = ? , descripcion = ? , completed = ? , usuario_id = ?  WHERE id = ?";
        $stmt = $this->conexion->prepare($actualizar);
        $stmt->bind_param("ssiii",$this->title,$this->descripcion,$this->completed,$this->usuario_id,$id);
        return $stmt->execute();
    }

    public function eliminar($id)
    {
        $eliminacion = "DELETE FROM tasks WHERE id = ?";
        $stmt = $this->conexion->prepare($eliminacion);
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}
?>