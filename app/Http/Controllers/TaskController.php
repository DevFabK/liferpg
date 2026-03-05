<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;

        return inertia('Tasks/Index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        return inertia('Tasks/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'xp_reward' => 'required|integer|min:1',
            'daily_limit' => 'required|integer|min:1'
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'xp_reward' => $request->xp_reward,
            'daily_limit' => $request->daily_limit,
            'completed' => false,
            'times_done' => 0
        ]);

        return redirect()->route('tasks.index');
    }

    public function complete(Task $task)
    {
        if ($task->completed || $task->times_done >= $task->daily_limit) {
            return back()->with('error', 'Cannot complete task');
        }

        $task->times_done++;
        $task->completed = true;
        $task->completed_at = now();
        $task->save();

        // XP
        $task->user->stats->addXp($task->xp_reward);

        return redirect()->route('tasks.index');
    }
}
