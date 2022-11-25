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
}
