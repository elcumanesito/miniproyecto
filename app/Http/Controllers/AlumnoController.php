<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return response()->json($alumnos, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',

        ]);

        $alumno = Alumno::create($request->all());
        return response()->json($alumno, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return response()->json($alumno, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
        'apellido' => 'required',

    ]);

    $alumno = Alumno::findOrFail($id);
    $alumno->update($request->all());
    return response()->json($alumno, 200);
}

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        return response()->json(null, 204);
    }

    public function matricular(Request $request, $alumno_id, $curso_id)
{
    $alumno = Alumno::findOrFail($alumno_id);
    $alumno->cursos()->attach($curso_id);
    return response()->json($alumno, 200);
}
}
