<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;  // Importar nuestro modelo

class TodosController extends Controller
{
    /**
     * Index para mostrar todos los elementos
     * store para guardar un todo
     * update para actualizar
     * detroy para eliminar
     * edit para mostrar el formulario de edicion
     */

     public function store(Request $request){
        # Validacion de datos 
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $todo = new Todo; # Crear objeto
        $todo -> title = $request -> title; # Asignamos los valores
        $todo -> save(); # Guardar un nuevo elemento en nuestra base de datos

        return redirect()->route('todos')->with('success', 'tarea creada correctamente'); # Regresar a nuestro view con un mensaje
     }
}
