<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function registrarAsistencia(Request $request, $alumno_id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'asistencia' => 'required|in:A,T,F',
        ]);

        $asistencia = Asistencia::create([
            'alumno_id' => $alumno_id,
            'fecha' => $request->input('fecha'),
            'asistencia' => $request->input('asistencia'),
        ]);

        return response()->json($asistencia, 201);
    }

    public function obtenerAsistencia(Request $request, $alumno_id, $fecha)
    {
        $asistencia = Asistencia::where('alumno_id', $alumno_id)
            ->where('fecha', $fecha)
            ->first();

        return response()->json($asistencia, 200);
    }
}

