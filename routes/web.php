<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::get('todos/create', 'create');
    Route::post('todos', 'store');
    Route::get('todos/{todo_id}', 'show');
    Route::get('todos/{todo_id}/edit', 'edit');
    Route::put('todos/{todo_id}', 'update');
    Route::delete('todos/{todo_id}', 'destroy');
});
