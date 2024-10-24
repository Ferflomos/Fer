<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    // Definir la tabla si no sigue la convención plural de Laravel
    protected $table = 'ciudades';

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'moneda_local',
        'simbolo_moneda',
        'tasa_cambio',
    ];
}

