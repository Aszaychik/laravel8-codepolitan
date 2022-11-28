<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function(){
    return view('about');
});

Route::get("/hello", function(){
    $dataArray = [
        'message' => 'Hello, world!',
        'author' => 'aszaychik'

    ];
    // return $dataArray;
    return response()->json($dataArray, 200);
});

Route::get("/debug", function(){
    $dataArray = [
        'message' => 'Hello, world!',
        'author' => 'aszaychik'
    ];
    ddd($dataArray);
});


Route::prefix('/tasks')
    ->controller(TaskController::class)
    ->middleware('auth')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/create', 'create');
    Route::get('/{id}','show');
    Route::get('{id}/edit/', 'edit');
    Route::patch('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

