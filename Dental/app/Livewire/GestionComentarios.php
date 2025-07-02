<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use App\Models\Cita;
use Livewire\WithPagination;

class GestionComentarios extends Component
{
    use WithPagination;

    public $comentario_id;
    public $mensaje;
    public $estado_comentario;
    public $id_cita;
    public $modal = false;
    public $isEdit = false;
    public $search = '';

    protected $rules = [
        'mensaje' => 'required|string|max:450',
        'estado_comentario' => 'required|string|max:30',
        'id_cita' => 'required|exists:citas,id_cita',
    ];

    public function render()
    {
        $comentarios = Comentario::with(['cita.paciente'])
            ->where(function($query) {
                $query->where('mensaje', 'like', '%' . $this->search . '%')
                    ->orWhere('estado_comentario', 'like', '%' . $this->search . '%')
                    ->orWhereHas('cita', function($q) {
                        $q->where('motivo', 'like', '%' . $this->search . '%')
                          ->orWhere('fecha_deseada', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('cita.paciente', function($q) {
                        $q->where('nombre', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderByDesc('fecha_comentario')
            ->paginate(10);

        $citas = \App\Models\Cita::with('paciente')->get();
        return view('livewire.gestion-comentarios-cita', compact('comentarios', 'citas'));
    }

    public function create()
    {
        $this->resetFields();
        $this->isEdit = false;
        $this->modal = true;
    }

    public function edit($id)
    {
        $comentario = Comentario::findOrFail($id);
        $this->comentario_id = $comentario->id_comentario;
        $this->mensaje = $comentario->mensaje;
        $this->estado_comentario = $comentario->estado_comentario;
        $this->id_cita = $comentario->id_cita;
        $this->isEdit = true;
        $this->modal = true;
    }

    public function save()
    {
        $this->validate();
        if ($this->isEdit) {
            $comentario = Comentario::findOrFail($this->comentario_id);
            $comentario->update([
                'mensaje' => $this->mensaje,
                'estado_comentario' => $this->estado_comentario,
                'id_cita' => $this->id_cita,
            ]);
        } else {
            Comentario::create([
                'fecha_comentario' => now()->toDateString(),
                'mensaje' => $this->mensaje,
                'estado_comentario' => $this->estado_comentario,
                'id_cita' => $this->id_cita,
            ]);
        }
        $this->modal = false;
        $this->resetFields();
    }

    public function delete($id)
    {
        Comentario::findOrFail($id)->delete();
    }

    public function resetFields()
    {
        $this->comentario_id = null;
        $this->mensaje = '';
        $this->estado_comentario = '';
        $this->id_cita = '';
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->resetFields();
    }
} 