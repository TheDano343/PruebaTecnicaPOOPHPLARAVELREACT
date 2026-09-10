import React, { useEffect, useState } from 'react'

const URL = "http://127.0.0.1:8000/";

export default function Usuarios() {

    const [usuarios, setUsuarios] = useState([]);
    const [name, setname] = useState("");
    const [email, setemail] = useState("");
    const [editUsuarioId, seteditUsuarioId] = useState(null);

    useEffect(() => {
        TraerRegistros();
    }, []);

    const TraerRegistros = async () => {
        try {
            const response = await fetch(URL + "api/usuario")

            const responseJson = await response.json();

            if (response.status === 200) {
                setUsuarios(responseJson);
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

            if (name === '') {
                error += 'name requerido.\n';
            }

            if (email === '') {
                error += 'email requerido.\n';
            }

            if (error !== '') {
                alert(error);
                return;
            }

            const body = {
                name,
                email
            }
            const response = await fetch(URL + "api/usuario", {
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

    const setEditUsuarios = (usuario) => {
        setname(usuario.name)
        setemail(usuario.email)
        seteditUsuarioId(usuario.id)
    }

    const handleUpdate = async () => {
        try {

            let error = ''

            if (name === '') {
                error += 'Estatus requerido.\n';
            }

            if (error !== '') {
                alert(error);
                return;
            }

            const body = {
                name,
                email
            };

            const response = await fetch(URL + "api/usuario/" + editUsuarioId, {
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

    const handleDeleteUsuarios = async (usuarioId) => {
        try {
            const response = await fetch(URL + "api/usuario/" + usuarioId, {
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
        setname('');
        setemail('');
        seteditUsuarioId(null);
    }



    return (
        <div className="container">

            <div className="form-group">
                <div>
                    <div className="mb-3">
                        <label c="form-label">title</label>
                        <input type="text" placeholder="Ingresa Titulo" className="form-control" value={name} onChange={(event) => setname(event.target.value)} />
                        <span>{name ? "" : "Titulo es requerido"}</span>
                    </div>

                    <div className="mb-3">
                        <label c="form-label">title</label>
                        <input type="text" placeholder="Ingresa Titulo" className="form-control" value={email} onChange={(event) => setemail(event.target.value)} />
                        <span>{email ? "" : "Titulo es requerido"}</span>
                    </div>

                    {editUsuarioId ? (
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
                        usuarios.map((usuario, index) => {
                            return (
                                <tr key={usuario.id}>
                                    <td>{usuario.id}</td>
                                    <td>{usuario.name}</td>
                                    <td>{usuario.email}</td>

                                    <th>
                                        <button onClick={() => setEditUsuarios(usuario)} className="btn btn-warning">Editar</button>
                                    </th>
                                    
                                    <th>
                                        <button onClick={() => handleDeleteUsuarios(usuario.id)} className="btn btn-danger">Eliminar</button>
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
