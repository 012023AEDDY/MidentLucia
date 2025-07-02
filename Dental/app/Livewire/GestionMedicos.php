<?php

namespace App\Livewire;

use App\Models\Medico;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class GestionMedicos extends Component
{
    use WithPagination, WithFileUploads;

    public $id_medico;
    public $nombre = '';
    public $telefono = '';
    public $email = '';
    public $foto;
    public $foto_original;
    public $descripcion = '';
    public $estado = '';
    public $search = '';
    public $showModal = false;
    public $isEditing = false;
    public $canEdit = true;

    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'foto' => $this->isEditing ? 'nullable|image|max:8192' : 'required|image|max:8192',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo',
        ];
    }

    public function mount()
    {
        if (Auth::check() && Auth::user()->isSecretaria()) {
            $this->canEdit = false;
        }
    }

    public function render()
    {
        $medicos = Medico::query()
            ->when($this->search, function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy('id_medico', 'asc')
            ->paginate(10);

        return view('livewire.gestion-medicos', [
            'medicos' => $medicos
        ]);
    }

    public function create()
    {
        if (!$this->canEdit) {
            abort(403, 'No tienes permiso para esta acción.');
        }
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function edit($id)
    {
        if (!$this->canEdit) {
            abort(403, 'No tienes permiso para esta acción.');
        }
        $medico = Medico::findOrFail($id);
        $this->id_medico = $medico->id_medico;
        $this->nombre = $medico->nombre;
        $this->telefono = $medico->telefono;
        $this->email = $medico->email;
        $this->foto_original = $medico->foto;
        $this->foto = null;
        $this->descripcion = $medico->descripcion;
        $this->estado = $medico->estado;
        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save()
    {
        if (!$this->canEdit) {
            abort(403, 'No tienes permiso para esta acción.');
        }
        $this->validate();
        $fotoPath = null;
        if ($this->foto && is_object($this->foto)) {
            $filename = $this->foto->getClientOriginalName();
            $fotoPath = $this->foto->storeAs('medicos', $filename, 'public');
        }
        if ($this->isEditing && $this->id_medico) {
            $medico = Medico::findOrFail($this->id_medico);
            $medico->update([
                'nombre' => $this->nombre,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'foto' => $fotoPath ? '/storage/' . $filename : $this->foto_original,
                'descripcion' => $this->descripcion,
                'estado' => $this->estado,
            ]);
        } else {
            Medico::create([
                'nombre' => $this->nombre,
                'telefono' => $this->telefono,
                'email' => $this->email,
                'foto' => $fotoPath ? '/storage/' . $filename : null,
                'descripcion' => $this->descripcion,
                'estado' => $this->estado,
            ]);
        }
        $this->closeModal();
        session()->flash('message', $this->isEditing ? 'Médico actualizado correctamente.' : 'Médico creado correctamente.');
    }

    public function delete($id)
    {
        if (!$this->canEdit) {
            abort(403, 'No tienes permiso para esta acción.');
        }
        $medico = Medico::findOrFail($id);
        $medico->delete();
        session()->flash('message', 'Médico eliminado exitosamente.');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->id_medico = null;
        $this->nombre = '';
        $this->telefono = '';
        $this->email = '';
        $this->foto = null;
        $this->foto_original = null;
        $this->descripcion = '';
        $this->estado = '';
        $this->resetValidation();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
