<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function index(Request $request){
        // ddd(request()->all());
        if($request->search){
            $query = DB::table('tasks')
                ->where('task', 'LIKE', "%$request->search%")
                ->get();
            return $query;
        };

        $query = DB::table('tasks')->get();
        return $query;
    }

    public function show($id)
    {
        $query = DB::table('tasks')->where('id', $id)->first();
        ddd($query);
    }

    public function store(Request $request)
    {
        DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user,
        ]);

        return 'Insert Data Success';
    }

    public function update(Request $request, $id)
    {
        DB::table('tasks')->where('id', $id)->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return "Update Data Success";
    }

    public function destroy($id)
    {
        DB::table('tasks')->where('id', $id)->delete();

        return "Delete Data Success";
    }
}
