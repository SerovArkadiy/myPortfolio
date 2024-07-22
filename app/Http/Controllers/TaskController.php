<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\TestTask;

use App\Models\User;
use App\Models\Specifications;
use App\Repositories\TaskRepository;
use App\Policies\TasksPolicy;

class TaskController extends Controller
{
    public function __construct(TaskRepository $task)
    {
        $this->middleware('auth');

        $this->tasks = $task;

    }




    public function index(Request $request){
//        Практически то же самое, только более упрощённо
//        $userId = auth()->user();
//        $tasks = Tasks::where('user_id', $userId->id)->get();
//        return view('tasks', compact('tasks'));
        $userId = $this->tasks->forUser($request->user());


        return view('tasks', ['tasks' => $userId]);
    }



    public function store()
    {
        //Достаём айди пользователя, чтобы добавить запись именно текущему авторизированному пользователю
        $userId = auth()->user();
        $data = request()->validate([
            'user_id' => '$userId->id',
            'title' => 'required|string|max:50',
            'task' => 'required|string',

        ]);

        $data['user_id'] = $userId->id;


        Tasks::create($data);

        $task = Tasks::latest()->first();

        $complete = ['task_id' => $task->id, 'completed' => false,];
        Specifications::create($complete);
        return redirect('/tasks');

    }



    public function welcome(){
        $testTasks = TestTask::all();
        return view('welcome', compact('testTasks'));
    }


    public function destroy(Tasks $task)
    {
        $this->authorize('delete', $task);

        $task->delete();
        return redirect('/tasks');
    }



    public function update(Tasks $task)
    {
        $complete = Specifications::find($task->id);

        if ($complete->completed == 0)
        {
            $complete->update(['completed' => true]);
        }
        else
        {
            $complete->update(['completed' => false]);
        }
        return redirect('/tasks');
    }



}
