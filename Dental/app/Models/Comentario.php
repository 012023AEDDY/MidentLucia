<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_comentario';

    protected $fillable = [
        'fecha_comentario',
        'mensaje',
        'estado_comentario',
        'id_cita',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'id_cita', 'id_cita');
    }
}