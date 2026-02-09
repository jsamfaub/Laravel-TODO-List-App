<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    use AuthorizesRequests;

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
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255', //TODO définir les critères pour name
            ],
            [
                'name.required' => 'Name can\'t be empty!',
                'name.max' => 'Name must be 255 characters or less.',
            ]
        );

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
        $this->authorize('update', $task);

        return view('tasks.edit', compact('task')); //TODO voir ce qu'est compact
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $validated = $request->validate(
            [
                'name' => 'required|string|max:255', //TODO définir les critères pour name
            ],
            [
                'name.required' => 'Name can\'t be empty!',
                'name.max' => 'Name must be 255 characters or less.',
            ]
        );

        $task->update($validated);

        return redirect('/')->with('success', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect('/')->with('success', 'Task deleted');
    }

    public function markAsCompleted(Task $task)
    {
        $this->authorize('update', $task);

        $task->markAsCompleted();

        return redirect('/')->with('success', 'Task completed status updated!');
    }

    public function markAsNotCompleted(Task $task)
    {
        $this->authorize('update', $task);

        $task->markAsNotCompleted();

        return redirect('/')->with('success', 'Task completed status erased!');
    }
}
