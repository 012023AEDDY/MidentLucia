<?php

namespace App\Livewire;

use App\Models\RolUsuario;
use Livewire\Component;
use Livewire\WithPagination;

class GestionRolUsuario extends Component
{
    use WithPagination;

    public $id;
    public $nombre_rol = '';
    public $descripcion = '';
    public $search = '';
    public $showModal = false;
    public $isEditing = false;

    protected function rules()
    {
        return [
            'nombre_rol' => 'required|string|max:40',
            'descripcion' => 'nullable|string|max:250',
        ];
    }

    public function render()
    {
        $roles = RolUsuario::query()
            ->when($this->search, function ($query) {
                $query->where('nombre_rol', 'like', '%' . $this->search . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('livewire.gestion-rol-usuario', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->showModal = true;
    }

    public function edit($id)
    {
        $rol = RolUsuario::findOrFail($id);
        $this->id = $rol->id;
        $this->nombre_rol = $rol->nombre_rol;
        $this->descripcion = $rol->descripcion;
        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();
        if ($this->isEditing && $this->id) {
            $rol = RolUsuario::findOrFail($this->id);
            $rol->update([
                'nombre_rol' => $this->nombre_rol,
                'descripcion' => $this->descripcion,
            ]);
        } else {
            RolUsuario::create([
                'nombre_rol' => $this->nombre_rol,
                'descripcion' => $this->descripcion,
            ]);
        }
        $this->closeModal();
        session()->flash('message', $this->isEditing ? 'Rol actualizado correctamente.' : 'Rol creado correctamente.');
    }

    public function delete($id)
    {
        $rol = RolUsuario::findOrFail($id);
        $rol->delete();
        session()->flash('message', 'Rol eliminado exitosamente.');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->id = null;
        $this->nombre_rol = '';
        $this->descripcion = '';
        $this->resetValidation();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
} 