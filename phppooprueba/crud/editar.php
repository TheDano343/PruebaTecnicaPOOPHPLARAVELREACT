<?php

include '../clases/Tasks.php';

$id = $_GET['id'] ?? null;

$task = new Task();
$taskActual = $task->obtenerId($id);

$usuario = new Task();
$usuarios = $usuario->obtenerUsuarios();


if(isset($_POST['actualizar']))
{
    $task = new Task($_POST['title'],$_POST['descripcion'],$_POST['completed'],$_POST['usuario_id']);

    if($task->actualizar($id))
    {
        header("Location: index.php");
    }else{
        echo "Error al actualizar";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../diseno/form.css">

</head>

<body>
    <div class="container">
        <form id="form" method="post">
            <h1>Actualizar</h1>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombre" name="title" value="<?= $taskActual['title']; ?>">
                <span id="nombre_error"></span>
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombre" name="descripcion" value="<?= $taskActual['descripcion']; ?>">
                <span id="nombre_error"></span>
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombre" name="completed" value="<?= $taskActual['completed']; ?>">
                <span id="nombre_error"></span>
            </div>

            <div class="form-group">
                <label>Carrera</label>
                <select class="form-control" id="carrera" name="usuario_id">
                    <option  value="">--Seleccione alguna carrera--</option>
                    
                    
                    <?php foreach ($usuarios as $usuario): ?>
                
                <option value="<?= $usuario['id'] ?>" <?= $usuario['id']==$taskActual['usuario_id']?'selected':'' ?>>
                <?= $usuario['name'] ?>
                </option>                       

                    <?php endforeach; ?>
                </select>
                <span id="carrera_error"></span>
            </div>

            <div class="form-group">
                <button type="submit" class="azul" name="actualizar">Actualizar</button>
                <a href="../crud/index.php">Regresar</a>
            </div>
        </form>
        <script src="../js/validacionPersonas.js"></script>
    </div>
</body>

</html>