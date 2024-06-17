<?php

use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

# ToDo CRUD
    # Read
    Route::get('/tareas',[ TodosController::class, 'index'])->name('todos');

    # Create
    Route::post('/tareas',[ TodosController::class, 'store'])->name('todos');

    # Update
    Route::get('/tareas/{id}',[ TodosController::class, 'show'])->name('todos-edit');
    Route::patch('/tareas/{id}',[ TodosController::class, 'update'])->name('todos-update');

    # Delete
    Route::delete('/tareas/{id}',[ TodosController::class, 'destroy'])->name('todos-destroy');
# end CRUD

# Categories CRUD
    Route::resource('categories',CategoriasController::class);

