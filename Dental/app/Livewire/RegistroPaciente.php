<?php

namespace App\Livewire;

use App\Models\Paciente;
use Livewire\Component;

class RegistroPaciente extends Component
{
    public $nombre = '';
    public $apaterno = '';
    public $amaterno = '';
    public $dni = '';
    public $fecha_nacimiento = '';
    public $telefono = '';
    public $direccion = '';
    public $sexo = '';
    public $email = '';
    public $successMessage = '';

    protected function rules()
    {
        return [
            'nombre' => 'required|min:2|max:40',
            'apaterno' => 'required|min:2|max:40',
            'amaterno' => 'required|min:2|max:40',
            'dni' => 'required|size:8|unique:pacientes,dni',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|size:9',
            'direccion' => 'required|min:5|max:40',
            'sexo' => 'required|in:M,F',
            'email' => 'required|email|max:60|unique:pacientes,email',
        ];
    }

    public function save()
    {
        $this->validate();
        Paciente::create([
            'nombre' => $this->nombre,
            'apaterno' => $this->apaterno,
            'amaterno' => $this->amaterno,
            'dni' => $this->dni,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'sexo' => $this->sexo,
            'email' => $this->email,
        ]);
        $this->resetForm();
        $this->successMessage = '¡Registro exitoso! Su información ha sido guardada.';
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->apaterno = '';
        $this->amaterno = '';
        $this->dni = '';
        $this->fecha_nacimiento = '';
        $this->telefono = '';
        $this->direccion = '';
        $this->sexo = '';
        $this->email = '';
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.registro-paciente');
    }
}
