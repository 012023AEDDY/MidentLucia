<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Support\Facades\Auth;

class GestionCitas extends Component
{
    public $citas;
    public $modal = false;
    public $editMode = false;
    public $citaId;
    public $fecha_solicitada, $fecha_deseada, $hora, $motivo, $estado, $observaciones, $id_paciente, $id_medico;
    public $pacientes = [], $medicos = [];
    public $search = '';

    protected $rules = [
        'fecha_solicitada' => 'required|date',
        'fecha_deseada' => 'required|date',
        'hora' => 'required',
        'motivo' => 'required|string|max:350',
        'estado' => 'required|string|max:30',
        'observaciones' => 'nullable|string|max:350',
        'id_paciente' => 'required|exists:pacientes,id_paciente',
        'id_medico' => 'required|exists:medicos,id_medico',
    ];

    public function mount()
    {
        $this->cargarDatos();
    }

    public function cargarDatos()
    {
        $this->citas = Cita::with(['paciente', 'medico'])->get();
        $this->pacientes = Paciente::all();
        $this->medicos = Medico::all();
    }

    public function showModal($id = null)
    {
        $this->resetInputFields();
        $this->modal = true;
        $this->editMode = false;
        if ($id) {
            $cita = Cita::findOrFail($id);
            $this->citaId = $cita->id_cita;
            $this->fecha_solicitada = $cita->fecha_solicitada;
            $this->fecha_deseada = $cita->fecha_deseada;
            $this->hora = $cita->hora;
            $this->motivo = $cita->motivo;
            $this->estado = $cita->estado;
            $this->observaciones = $cita->observaciones;
            $this->id_paciente = $cita->id_paciente;
            $this->id_medico = $cita->id_medico;
            $this->editMode = true;
        }
    }

    public function resetInputFields()
    {
        $this->citaId = null;
        $this->fecha_solicitada = '';
        $this->fecha_deseada = '';
        $this->hora = '';
        $this->motivo = '';
        $this->estado = '';
        $this->observaciones = '';
        $this->id_paciente = '';
        $this->id_medico = '';
    }

    public function saveCita()
    {
        $this->validate();
        if ($this->editMode && $this->citaId) {
            $cita = Cita::findOrFail($this->citaId);
            $cita->update([
                'fecha_solicitada' => $this->fecha_solicitada,
                'fecha_deseada' => $this->fecha_deseada,
                'hora' => $this->hora,
                'motivo' => $this->motivo,
                'estado' => $this->estado,
                'observaciones' => $this->observaciones,
                'id_paciente' => $this->id_paciente,
                'id_medico' => $this->id_medico,
            ]);
        } else {
            Cita::create([
                'fecha_solicitada' => $this->fecha_solicitada,
                'fecha_deseada' => $this->fecha_deseada,
                'hora' => $this->hora,
                'motivo' => $this->motivo,
                'estado' => $this->estado,
                'observaciones' => $this->observaciones,
                'id_paciente' => $this->id_paciente,
                'id_medico' => $this->id_medico,
                'id_usuario' => Auth::id(),
            ]);
        }
        $this->modal = false;
        $this->cargarDatos();
        $this->resetInputFields();
    }

    public function deleteCita($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();
        $this->cargarDatos();
    }

    public function render()
    {
        $query = Cita::with(['paciente', 'medico']);

        if ($this->search) {
            $query->where(function($q) {
                $q->whereHas('paciente', function($q2) {
                    $q2->where('nombre', 'like', '%'.$this->search.'%')
                        ->orWhere('apaterno', 'like', '%'.$this->search.'%')
                        ->orWhere('amaterno', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('medico', function($q2) {
                    $q2->where('nombre', 'like', '%'.$this->search.'%');
                })
                ->orWhere('motivo', 'like', '%'.$this->search.'%');
            });
        }

        $this->citas = $query->get();
        return view('livewire.gestion-citas');
    }
}
