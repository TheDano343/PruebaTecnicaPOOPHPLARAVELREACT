<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Usuario;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Usuario::all();
        return response()->json($usuario, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $request = Usuario::create($request->all());
        return response()->json(['message' => 'Usuario Agregada', $request], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, $usuario)
    {
        $usuario = Usuario::find($usuario);
        $usuario->update($request->all());

        return response()->json(['message'=>'Usuario Actualizado',$usuario], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($usuario)
    {
        $usuario = Usuario::find($usuario);
        $usuario->delete();

        return response()->json(['message' => 'Usuario Eliminado', $usuario]);
    }
}
