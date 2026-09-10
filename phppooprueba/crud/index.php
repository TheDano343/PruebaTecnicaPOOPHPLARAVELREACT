<?php
    include '../clases/Tasks.php';

    $task = new Task();
    $tasks = $task->obtenerTasks();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../diseno/style.css">
</head>

<body>

    <div class="centrado">
        <a href="crear.php"><button class="azul">Agregar</button></a>

        <table border="1">
            <thead>
                <tr>
                    <td scope="col">Id</td>
                    <td scope="col">title</td>
                    <td scope="col">descripcion</td>
                    <td scope="col">completed</td>
                    <td scope="col">usuario_id </td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tasks as $task): ?>
                <tr>
                    <td class="type">
                        <?= $task['id']; ?>
                    </td>
                    <td class="type">
                        <?= $task['title']; ?>
                    </td>
                    <td class="type">
                        <?= $task['descripcion']; ?>
                    </td>
                    <td class="type">
                        <?= $task['completed']; ?>
                    </td>
                    <td class="type">
                        <?= $task['name']; ?>
                    </td>
                    <td>
                        <th><a href="editar.php?id=<?= $task['id']; ?>"><button class="amarillo">Editar</button></a></th>
                        <th><a href="eliminar.php?id=<?= $task['id']; ?>"><button class="rojo">Borrar</button></a></th>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>