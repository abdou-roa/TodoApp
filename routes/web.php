<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskModelController;

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

Route::get('/',[TaskModelController::class, 'index'])->name('home'); 
// create new task
Route::post('/store', [TaskModelController::class, 'store'])->name('addtask');
// delete task with id
Route::delete('task/{id}', [TaskModelController::class, 'destroy'])->name('deleteTask');
// edit task 
Route::get('/editTask/{id}', [TaskModelController::class, 'edit'])->name('editTask');
// update task
Route::post('/updateTask/{id}', [TaskModelController::class, 'update'])->name('updateTask');
