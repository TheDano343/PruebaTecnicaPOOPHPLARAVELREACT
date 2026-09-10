<?php

    include '../clases/Tasks.php';

    $task = new Task();

    $id = $_GET['id'] ?? null;

    if($id && $task->eliminar($id))
    {
        header("Location: index.php");
    }else{
        echo "Error al actualizar";
    }

?>