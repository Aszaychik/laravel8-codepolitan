<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private $taskList = [
        "first" => "Coding",
        'second' => 'Sleep',
        'third' => 'Reading',
        'fourth' => 'Research'
    ];

    public function index(Request $request){
        // ddd(request()->all());
        if($request->search){
            $showDB = DB::table('tasks')
                ->where('task', 'LIKE', "%$request->search%")
                ->get();
            return $showDB;
        };

        $showDB = DB::table('tasks')->get();
        return $showDB;
    }

    public function show($id)
    {
        $data = DB::table('tasks')->where('id', $id)->first();
        ddd($data);
    }

    public function store(Request $request)
    {
        DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user,
        ]);

        return 'success';
    }

    public function update(Request $request, $key)
    {
        $this->taskList[$key] = $request->task;
        return $this->taskList;
    }

    public function destroy($key)
    {
        unset($this->taskList[$key]);
        return $this->taskList;
    }
}
