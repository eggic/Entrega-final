<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    // Si tu tabla no tiene el nombre plural de forma automática, puedes especificarlo
    protected $table = 'registros'; // Nombre de la tabla en la base de datos

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = ['nombre', 'descripcion'];
}
