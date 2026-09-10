<?php

require_once '../clases/Tasks.php';

$task = new Task();
$tasks = $task->obtenerTasks();
$usuario = new Task();
$usuarios = $usuario->obtenerUsuarios();


if(isset($_POST['crear']))
    {
        $task = new Task($_POST['title'],$_POST['descripcion'],$_POST['completed'],$_POST['usuario_id']);

        if($task->crear())
        {
            header("Location: index.php");
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
            <h1>Crear</h1>

            <div class="form-group">
                <label>Nombre Persona</label>
                <input type="text" class="form-control" id="nombre" name="title">
                <span id="nombre_error"></span>
            </div>

            <div class="form-group">
                <label>Nombre Persona</label>
                <input type="text" class="form-control" id="nombre" name="descripcion">
                <span id="nombre_error"></span>
            </div>

            <div class="form-group">
                <label>Nombre Persona</label>
                <input type="text" class="form-control" id="nombre" name="completed">
                <span id="nombre_error"></span>
            </div>

            <div class="form-group">
                <label>Carrera</label>
                <select class="form-control" id="carrera" name="usuario_id">
                    <option selected disabled>--Seleccione alguna carrera--</option>


                    <?php foreach ($usuarios as $usuario): ?>

                    <option value="<?= $usuario['id'] ?>">
                        <?= $usuario['name'] ?>
                    </option>


                    <?php endforeach; ?>
                </select>
                <span id="carrera_error"></span>

            </div>

            <div class="form-group">
                <button class="azul" type="submit" name="crear">Crear</button>
                <a href="../crud/index.php">Regresar</a>
            </div>
        </form>
        <script src="../js/validacionPersonas.js"></script>
    </div>
</body>

</html>