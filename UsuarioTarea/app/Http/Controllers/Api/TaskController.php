<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Task;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Task::orderByRaw('completed DESC')
             ->orderBy('title', 'asc')
             ->orderBy('created_at', 'desc')
             ->get();
        return response()->json($task, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $request = Task::create($request->all());
        return response()->json(['message' => 'Tarea Agregada', $request], 201);
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
    public function update(UpdateTaskRequest $request, $task)
    {
        $task = Task::find($task);
        $task->update($request->all());

        return response()->json(['message'=>'Tarea Actualizado',$task], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        $task = Task::find($task);
        $task->delete();

        return response()->json(['message' => 'Tarea Eliminado', $task]);
    }
}
