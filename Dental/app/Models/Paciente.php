<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    
    protected $fillable = [
        'nombre',
        'apaterno',
        'amaterno',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'sexo',
        'email',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    // Relación con citas (si existe)
    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_paciente', 'id_paciente');
    }

    // Accesor para nombre completo
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->apaterno} {$this->amaterno}";
    }

    // Accesor para edad
    public function getEdadAttribute()
    {
        return $this->fecha_nacimiento ? $this->fecha_nacimiento->age : null;
    }
}
