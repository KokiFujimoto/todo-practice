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
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'todoView'])->name('todoView');
Route::post('/task', [App\Http\Controllers\TaskController::class, 'todoCreate'])->name('todoCreate');
Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'todoDelete'])->name('todoDelete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\TaskController::class, 'todoView'])->name('home');
