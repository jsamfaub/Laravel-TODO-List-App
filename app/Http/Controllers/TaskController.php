<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all(); //TODO seulement celle de l'utilisateur authentifié

        return view('tasks', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', //TODO définir les critères pour name
            ],
            [
                'name.required' => 'Name can\'t be empty!',
                'name.max' => 'Name must be 255 characters or less.',
            ]);

            auth()->user()->tasks()->create($validated);

            return redirect('/')->with('success', 'Task has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }

    public function markAsComplete(Task $task)
    {
        //TODO
    }

    public function markAsNotComplete(Task $task)
    {
        //TODO
    }
}
