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

     public function index(){
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
     }

     public function show($id){
        $todo = Todo::find($id);   
        return view('todos.show', ['todo' => $todo]);
     }

     public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo -> title = $request -> title;
        $todo -> save();

        //return view('todos.index', ['success' => 'tarea actualizada']);
        return redirect()->route('todos')->with('success','tarea actualizada');
     }

     public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        
        return redirect()->route('todos')->with('success','tarea eliminada correctamente');
     }
}
