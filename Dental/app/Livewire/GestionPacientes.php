<?php

namespace App\Livewire;

use App\Models\Paciente;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class GestionPacientes extends Component
{
    use WithPagination;

    // Propiedades para el formulario
    public $id_paciente;
    public $nombre = '';
    public $apaterno = '';
    public $amaterno = '';
    public $dni = '';
    public $fecha_nacimiento = '';
    public $telefono = '';
    public $direccion = '';
    public $sexo = '';
    public $email = '';

    // Propiedades para la búsqueda y filtros
    public $search = '';
    public $sexoFilter = '';

    // Propiedades para el modal
    public $showModal = false;
    public $isEditing = false;

    protected $listeners = ['refreshComponent' => '$refresh'];

    // Reglas de validación
    protected function rules()
    {
        return [
            'nombre' => 'required|min:2|max:40',
            'apaterno' => 'required|min:2|max:40',
            'amaterno' => 'required|min:2|max:40',
            'dni' => 'required|size:8|unique:pacientes,dni,' . $this->id_paciente . ',id_paciente',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|size:9',
            'direccion' => 'required|min:5|max:40',
            'sexo' => 'required|in:M,F',
            'email' => 'required|email|max:60|unique:pacientes,email,' . $this->id_paciente . ',id_paciente',
        ];
    }

    public function render()
    {
        $pacientes = Paciente::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nombre', 'like', '%' . $this->search . '%')
                      ->orWhere('apaterno', 'like', '%' . $this->search . '%')
                      ->orWhere('amaterno', 'like', '%' . $this->search . '%')
                      ->orWhere('dni', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->sexoFilter, function ($query) {
                $query->where('sexo', $this->sexoFilter);
            })
            ->orderBy('id_paciente', 'asc')
            ->paginate(10);

        return view('livewire.gestion-pacientes', [
            'pacientes' => $pacientes
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
        $paciente = Paciente::findOrFail($id);
        
        $this->id_paciente = $paciente->id_paciente;
        $this->nombre = $paciente->nombre;
        $this->apaterno = $paciente->apaterno;
        $this->amaterno = $paciente->amaterno;
        $this->dni = $paciente->dni;
        $this->fecha_nacimiento = $paciente->fecha_nacimiento;
        $this->telefono = $paciente->telefono;
        $this->direccion = $paciente->direccion;
        $this->sexo = $paciente->sexo;
        $this->email = $paciente->email;

        $this->isEditing = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->isEditing) {
            $paciente = Paciente::findOrFail($this->id_paciente);
            $paciente->update([
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

            session()->flash('message', 'Paciente actualizado exitosamente.');
        } else {
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

            session()->flash('message', 'Paciente creado exitosamente.');
        }

        $this->closeModal();
        $this->resetForm();
    }

    public function delete($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
        
        session()->flash('message', 'Paciente eliminado exitosamente.');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->id_paciente = null;
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

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSexoFilter()
    {
        $this->resetPage();
    }
}
