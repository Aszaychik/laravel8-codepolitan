<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function index(Request $request){
        // ddd(request()->all());
        if($request->search){
            $data = Task::where('task', 'LIKE', "%$request->search%")
                ->paginate(5);
            return view('task.index', [
                'data' => $data
            ]);
        };

        $data = Task::paginate(5);
        return view('task.index', [
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $query = Task::find($id);
        return $query;
    }

    public function create(){
        return view('task.create');
    }

    public function store(Request $request)
    {
        Task::create([
            'task' => $request->task,
            'user' => $request->user,
        ]);

        return redirect('/tasks');
    }

    public function edit($id){
        return view('task.edit');
    }

    public function update(Request $request, $id)
    {
        Task::find($id)->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return "Update Data Success";
    }

    public function destroy($id)
    {
        Task::find($id)->delete();

        return "Delete Data Success";
    }
}
