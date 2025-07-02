<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comentario;
use Illuminate\Support\Carbon;

class ComentariosCita extends Component
{
    public $id_cita;
    public $comentarios;
    public $mensaje = '';

    public function mount($id_cita)
    {
        $this->id_cita = $id_cita;
        $this->cargarComentarios();
    }

    public function cargarComentarios()
    {
        $this->comentarios = Comentario::where('id_cita', $this->id_cita)
            ->orderByDesc('fecha_comentario')
            ->get();
    }

    public function agregarComentario()
    {
        $this->validate([
            'mensaje' => 'required|string|max:450',
        ]);

        Comentario::create([
            'fecha_comentario' => Carbon::now()->toDateString(),
            'mensaje' => $this->mensaje,
            'estado_comentario' => 'activo', // Puedes ajustar esto según tu lógica
            'id_cita' => $this->id_cita,
        ]);

        $this->mensaje = '';
        $this->cargarComentarios();
        session()->flash('mensaje', 'Comentario agregado correctamente.');
    }

    public function render()
    {
        return view('livewire.comentarios-cita');
    }
}