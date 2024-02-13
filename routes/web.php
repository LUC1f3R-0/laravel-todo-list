<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('/post', [TodoController::class, 'todo'])->name('save.data.todo');
Route::get('/', [TodoController::class, 'ShowData']);
Route::get('/{toid}/delete', [TodoController::class, 'delete'])->name('delete.data.todo');



