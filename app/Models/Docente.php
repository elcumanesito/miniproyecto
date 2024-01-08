<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    public function docentes()
{
    return $this->hasMany(Docente::class);
}

public function alumnos()
{
    return $this->belongsToMany(Alumno::class);
}
}
