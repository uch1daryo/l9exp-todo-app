<?php

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

Route::get('todos', function () {
    return view('todos.index');
});
Route::get('todos/create', function () {
    return view('todos.create');
});
Route::post('todos', function () {});
Route::get('todos/{todo_id}', function () {
    return view('todos.show');
});
Route::get('todos/{todo_id}/edit', function () {
    return view('todos.edit');
});
Route::put('todos/{todo_id}', function () {});
Route::delete('todos/{todo_id}', function () {});
