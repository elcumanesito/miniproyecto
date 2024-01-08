<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AsistenciaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes/api.php

// Rutas para Docentes
Route::resource('docentes', DocenteController::class);

// Rutas para Alumnos
Route::resource('alumnos', AlumnoController::class);
Route::put('alumnos/{alumno_id}/matricular/{curso_id}', [AlumnoController::class, 'matricular']);

// Rutas para Cursos
Route::resource('cursos', CursoController::class);

// Rutas para Asistencias
Route::post('alumnos/{alumno_id}/asistencias', [AsistenciaController::class, 'registrarAsistencia']);
Route::get('alumnos/{alumno_id}/asistencias/{fecha}', [AsistenciaController::class, 'obtenerAsistencia']);

