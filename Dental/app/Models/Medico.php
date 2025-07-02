<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{   public $canEdit = true;
    protected $primaryKey = 'id_medico';

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'foto',
        'descripcion',
        'estado',
    ];

}