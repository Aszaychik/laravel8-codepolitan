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
            $query = Task::where('task', 'LIKE', "%$request->search%")
                ->get();
            return $query;
        };

        $query = Task::all();
        return $query;
    }

    public function show($id)
    {
        $query = Task::find($id);
        return $query;
    }

    public function store(Request $request)
    {
        Task::create([
            'task' => $request->task,
            'user' => $request->user,
        ]);

        return 'Insert Data Success';
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
