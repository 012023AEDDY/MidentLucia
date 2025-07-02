<div class="w-full mx-auto my-8 p-6 bg-white rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-2xl font-bold text-blue-700">Gestión de Comentarios</h2>
            <p class="text-gray-500">Administra los comentarios de los pacientes sobre sus citas</p>
        </div>
        <button wire:click="create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"></path></svg>
            Nuevo Comentario
        </button>
    </div>

    <div class="flex justify-between items-center mb-4">
        <div class="w-1/2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
            <div class="relative">
                <input wire:model.live="search" type="text" placeholder="Buscar por paciente, cita o mensaje..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
        <div class="text-right">
            <span class="text-gray-500">Total Comentarios</span>
            <div class="text-2xl font-bold text-blue-700">{{ $comentarios->total() }}</div>
        </div>
    </div>

    <div class="overflow-x-auto rounded-lg border">
        <table class="min-w-full w-full bg-white">
            <thead>
                <tr class="bg-blue-100 text-blue-800">
                    <th class="px-4 py-2 text-left">Paciente</th>
                    <th class="px-4 py-2 text-left">Cita</th>
                    <th class="px-4 py-2 text-left">Mensaje</th>
                    <th class="px-4 py-2 text-left">Fecha</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($comentarios as $comentario)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $comentario->cita->paciente->nombre ?? 'Paciente' }}</td>
                        <td class="px-4 py-2">
                            {{ $comentario->cita->fecha_deseada ?? '' }}
                            <div class="text-xs text-gray-500">{{ $comentario->cita->motivo ?? '' }}</div>
                        </td>
                        <td class="px-4 py-2">{{ $comentario->mensaje }}</td>
                        <td class="px-4 py-2">{{ $comentario->fecha_comentario }}</td>
                        <td class="px-4 py-2">{{ $comentario->estado_comentario }}</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center gap-2">
                                <button wire:click="edit({{ $comentario->id_comentario }})" class="text-blue-600 hover:text-blue-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button wire:click="delete({{ $comentario->id_comentario }})" onclick="return confirm('¿Estás seguro de eliminar este comentario?')" class="text-red-600 hover:text-red-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No hay comentarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $comentarios->links() }}
    </div>

    {{-- Modal --}}
    @if ($modal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-70 z-50">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">{{ $isEdit ? 'Editar Comentario' : 'Nuevo Comentario' }}</h3>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Cita</label>
                            <select wire:model="id_cita" class="w-full border rounded p-2">
                                <option value="">Seleccione una cita</option>
                                @foreach($citas as $cita)
                                    <option value="{{ $cita->id_cita }}">
                                        {{ $cita->paciente->nombre ?? 'Paciente' }} | {{ $cita->fecha_deseada }} | {{ $cita->motivo }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_cita') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Estado</label>
                            <input type="text" wire:model.defer="estado_comentario" class="w-full border rounded p-2" placeholder="Estado del comentario">
                            @error('estado_comentario') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Mensaje</label>
                            <textarea wire:model.defer="mensaje" rows="3" class="w-full border rounded p-2"></textarea>
                            @error('mensaje') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">{{ $isEdit ? 'Guardar' : 'Crear' }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>