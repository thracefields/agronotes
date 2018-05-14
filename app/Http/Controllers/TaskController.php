<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Task;
use Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        if(request()->ajax()) {
            $tasks = Task::where('user_id', $currentUser->id)->get();
            $result = [];
            foreach($tasks as $task) {
                    $item = ['title' => $task->title,
                        'start' => $task->start,
                        'description' => $task->description,
                        'url' => route('tasks.show', $task->id)];
                    array_push($result, $item);
                }
           return response()->json($result);
        }
        
        $tasks = Task::all()->where('user_id', $currentUser->id);
        return view('tasks.index')->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:20',
            'description' => 'required|max:300',
            'start' => 'required|date'
        ]);
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->start = $request->start;
        $task->user_id = Auth::user()->id;
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        $currentUser = Auth::user();
        if($currentUser->id == $task->user_id) {
            return view('tasks.show')->withTask($task);
        }
        return redirect()->route('tasks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $currentUser = Auth::user();
        if($currentUser->id == $task->user_id) {
            return view('tasks.edit')->withTask($task);
        }

        return redirect()->route('tasks.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:20',
            'description' => 'required|max:300',
            'start' => 'required|date'
        ]);

        $task = Task::findOrFail($id);
        $currentUser = Auth::user();
        if($currentUser->id == $task->user_id) {
            $task->title = $request->title;
            $task->description = $request->description;
            $task->start = $task->start;
            $task->save();

            Session::flash('success', 'Мероприятието беше редактирано успешно.');

            return redirect()->route('tasks.show', $task->id);
        }

        return redirect()->route('tasks.index');
    }

}
