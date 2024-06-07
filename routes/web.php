<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tareas',function(){
    return view('todos/index');
})->name('todos');

Route::post('/tareas',[ TodosController::class, 'store'])->name('todos');