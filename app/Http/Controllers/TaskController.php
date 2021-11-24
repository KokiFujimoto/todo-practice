<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * コンストラクタ
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function todoView(Task $tasks, Request $request)
    {
        // $tasks = Task::orderBy('created_at', 'asc')->get();
        $tasks = $request->user()->tasks()->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * 新規タスク登録
     * 
     * @param Request $request
     * @return Response
     */
    public function todoCreate(Request $request)
    {
        // Task::create([
        //    'user_id' => 0,
        //    'name' => $request->name
        // ]);
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
        
        return redirect('/tasks');
    }

    /**
     * タスク削除
     * 
     * @param Request $request
     * @param Task $task
     * @return Response
     */
    public function todoDelete(Request $request, Task $task)
    {
        $this->authorize('todoDelete', $task);

        // $task = Task::find($request->id);

        $task->delete();
        return redirect('/tasks');
    }
}
