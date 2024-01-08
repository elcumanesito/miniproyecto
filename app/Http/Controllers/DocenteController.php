<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::all();
        return response()->json($docentes, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'curso_id' => 'exists:cursos,id',
        ]);

        $docente = Docente::create($request->all());
        return response()->json($docente, 201);
    }

    public function show($id)
    {

        $docente = Docente::findOrFail($id);
        return response()->json($docente, 200);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'curso_id' => 'exists:cursos,id'
        ]);

        $docente = Docente::findOrFail($id);
        $docente->update($request->all());
        return response()->json($docente, 200);
    }

    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();
        return response()->json(null, 204);
    }
}
