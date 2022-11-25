<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskList = [
        "first" => "Coding",
        'second' => 'Sleep',
        'third' => 'Reading',
        'fourth' => 'Research'
    ];

    public function index(){
        // ddd(request()->all());
        if(request()->search){
            return $this->taskList[request()->search];
        };
        return $this->taskList;
    }

    public function show($param)
    {
        return $this->taskList[$param];
    }

    public function store()
    {
        $this->taskList[request()->label] = request()->task;
        return $this->taskList;
    }

    public function update($key)
    {
        $this->taskList[$key] = request()->task;
        return $this->taskList;
    }

    public function destroy($key)
    {
        unset($this->taskList[$key]);
        return $this->taskList;
    }
}
