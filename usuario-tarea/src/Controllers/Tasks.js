import React, { useEffect, useState } from 'react';

const URL = "http://127.0.0.1:8000/";

export default function Tasks() {

  const [tasks, setTasks] = useState([]);
  const [usuarios, setUsuarios] = useState([]);

  const [title, setTitle] = useState("");
  const [descripcion, setDescripcion] = useState("");
  const [completed, setCompleted] = useState("");
  const [usuario_id, setUsuariosId] = useState("");

  const [editTasksId, seteditTasksId] = useState(null);

  useEffect(() => {
    TraerRegistros();
  }, []);

  const TraerRegistros = async () => {
    try {

      const response = await fetch(URL + "api/task")
      const response2 = await fetch(URL + "api/usuario")

      const responseJson = await response.json();
      const responseJson2 = await response2.json();

      if (response.status === 200) {
        setTasks(responseJson);
      }

      if (response2.status === 200) {
        setUsuarios(responseJson2);
      }

      // console.log(response)
      console.log(responseJson)

    } catch (error) {
      alert("Algo salio mal, intenta otra vez");
    }
  }

  const handleSubmit = async () => {
    try {

      let error = ''

      if (title === '') {
        error += 'Titulo requerido.\n';
      }

      if (descripcion === '') {
        error += 'Descripcion requerido.\n';
      }

      if (completed === '') {
        error += 'Descripcion requerido.\n';
      }

      if (usuario_id === '') {
        error += 'Selecciona un Estatus.\n';
      }

      if (error !== '') {
        alert(error);
        return;
      }

      const body = {
        title,
        descripcion,
        completed,
        usuario_id
      }

      const response = await fetch(URL + "api/task", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(body)
      })

      const responseJson = await response.json();
      // console.log(responseJson);
      if (response.status === 201) {
        // alert("Usuario agregado correctamente");
        TraerRegistros();
        limpiarDato();
      } else {
        if (responseJson.message) {
          alert(responseJson.message);
        }
      }
      console.log(response)
    } catch (error) {
      alert("Algo salio mal, intenta otra vez");
      alert(error);
    }
  }

  const handleUpdate = async () => {
    try {

      let error = ''

      if (title === '') {
        error += 'Titulo requerido.\n';
      }

      if (descripcion === '') {
        error += 'Descripcion requerido.\n';
      }

      if (completed === '') {
        error += 'Descripcion requerido.\n';
      }

      if (usuario_id === '') {
        error += 'Selecciona un Estatus.\n';
      }

      if (error !== '') {
        alert(error);
        return;
      }

      const body = {
        title,
        descripcion,
        completed,
        usuario_id
      };

      const response = await fetch(URL + "api/task/" + editTasksId, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(body)
      });

      if (response.ok) {
        // alert("Usuario actualizado correctamente");
        TraerRegistros();
        limpiarDato();
      }
    } catch (error) {
      alert("Algo salio mal, intenta otra vez");
    }
  }

  const setEditTask = (task) => {
    setTitle(task.title)
    setDescripcion(task.descripcion)
    setCompleted(task.completed)
    setUsuariosId(task.usuario_id)

    seteditTasksId(task.id)
  }

  const handleDeleteTask = async (taskId) => {
    try {
      const response = await fetch(URL + "api/task/" + taskId, {
        method: "DELETE",
      })

      if (response.status === 200) {
        // alert("Usuario eliminado correctamente");
        TraerRegistros();
      }
    } catch (error) {
      alert("Algo salio mal, intenta otra vez");
    }
  }

  const limpiarDato = () => {
    setTitle('');
    setDescripcion('');
    setCompleted('');
    setUsuariosId('');

    seteditTasksId(null);
  }

  return (
    <div className="container">

      <div className="form-group">
        <div>
          <div className="mb-3">
            <label className="form-label">Titulo</label>
            <input type="text" placeholder="Ingresa Titulo" className="form-control" value={title} onChange={(event) => setTitle(event.target.value)} />
            <span>{title ? "" : "Titulo es requerido"}</span>
          </div>

          <div className="mb-3">
            <label className="form-label">Descripcion</label>
            <input type="text" placeholder="Ingresa Titulo" className="form-control" value={descripcion} onChange={(event) => setDescripcion(event.target.value)} />
            <span>{descripcion ? "" : "Descripcion es requerido"}</span>
          </div>

          <div className="mb-3">
            <label className="form-label">Completed</label>
            <input type="text" placeholder="Ingresa Titulo" className="form-control" value={completed} onChange={(event) => setCompleted(event.target.value)} />
            <span>{completed ? "" : "Completed es requerido"}</span>
          </div>

          <div className="mb-3">
            <label className="form-label">Completed</label>
            <select
              className="form-control"
              value={completed}
              onChange={(event) => setCompleted(event.target.value)}
            >
              <option value="">Selecciona una opción</option>
              <option value="1">Sí (1)</option>
              <option value="0">No (0)</option>
            </select>
            <span>{completed ? "" : "Este campo es requerido"}</span>
          </div>

          {editTasksId ? (
            <>
              <button onClick={handleUpdate} className="btn btn-warning">Editar</button>
              <button onClick={() => limpiarDato()} className="btn btn-danger">Cancelar</button>
            </>
          ) : (
            <button onClick={handleSubmit} className="btn btn-primary">Agregar Tarea</button>
          )}
        </div>
      </div>

      <table className="table table-responsive table-hover">

        <tbody>
          {
            tasks.map((task, index) => {

              const usuariosTask = usuarios.find((e) => e.id === task.usuario_id);

              return (
                <tr key={task.id}>
                  <td>{task.id}</td>
                  <td>{task.title}</td>
                  <td>{task.completed}</td>
                  <td>{task.descripcion}</td>

                  <td>{usuariosTask.name}</td>

                  <th>
                    <button onClick={() => setEditTask(task)} className="btn btn-warning">Editar</button>
                  </th>

                  <th>
                    <button onClick={() => handleDeleteTask(task.id)} className="btn btn-danger">Eliminar</button>
                  </th>

                </tr>
              );
            })
          }

        </tbody>
      </table>

    </div>
  )
}
