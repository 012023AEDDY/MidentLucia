<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';
    protected $fillable = [
        'fecha_solicitada',
        'fecha_deseada',
        'hora',
        'motivo',
        'estado',
        'observaciones',
        'id_paciente',
        'id_medico',
        'id_usuario',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico', 'id_medico');
    }
}
