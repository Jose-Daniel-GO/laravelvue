<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::paginate(50);
        return response()->json($tasks);
    }

    
    public function create()
    {
    }

    public function store(Request $request)
    {
        if (!is_array($request->all())) {
            return ['error' => 'request must be an array'];
        }
        Task::create($request->all());
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        // $task = Task::find();
        // $task->save();
        return response()->json($task);
    }

    
    public function update(Request $request, Task $task)
    {
        // $task = Task::find();
        $task -> todo = $request['task'];
        $task -> completed = $request['completed'];
        $task->update($request->all());

        return response()->json($task); 
    }


    public function destroy( $id)
    {
        try {
            if (is_numeric($id)) {
                $task = Task::find($id);

                if (is_null($task)) {
                    return response()->json(['error' => true, 'La tarea no existe!']);
                } else {
                    $task->delete();
                    return response()->json(['deleted' => true, 'eliminado!']);
                }
            } else {
                return response()->json(['deleted' => false, 'No eliminado!']);
            }
        } catch (Exception $e) {
            return response()->json(['deleted' => false, 'error mensaje' => $e], 500);
        }   
    }
    // public function destroy($id)
    // {
    //     $task = Task::find($id);
    //     $task->delete();
    // }
}
