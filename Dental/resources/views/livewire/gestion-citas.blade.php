<div class="p-4">
    <div class="mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Gestión de Citas</h2>
                <p class="text-gray-500">Administra las citas del sistema dental</p>
            </div>
            <button wire:click="showModal" class="flex items-center gap-2 px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium shadow">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nueva Cita
            </button>
        </div>
        <div class="mt-6 bg-gray-50 rounded-xl p-4 flex flex-col md:flex-row md:items-center md:gap-6">
            <div class="flex-1 mb-4 md:mb-0">
                <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                <div class="relative">
                    <input wire:model.live="search" type="text" placeholder="Buscar por paciente, médico o motivo..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Total Citas</label>
                <div class="bg-white rounded-lg p-4 shadow text-3xl text-blue-600 font-bold text-center">
                    {{ $citas->count() }}
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-600">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">Paciente</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">Médico</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">Fecha Solicitada</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">Fecha Deseada</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">Hora</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">Motivo</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">Estado</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">Observaciones</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-white uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($citas as $cita)
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $cita->id_cita }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $cita->paciente->nombre_completo ?? 'N/A' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $cita->medico->nombre ?? 'N/A' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $cita->fecha_solicitada }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $cita->fecha_deseada }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $cita->hora }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $cita->motivo }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm">
                            <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                                @if($cita->estado === 'pendiente') bg-yellow-100 text-yellow-800
                                @elseif($cita->estado === 'atendida') bg-green-100 text-green-800
                                @elseif($cita->estado === 'cancelada') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($cita->estado) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">{{ $cita->observaciones }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm flex gap-2">
                            <div class="flex items-center gap-2">
                                <button wire:click="showModal({{ $cita->id_cita }})" class="text-blue-600 hover:text-blue-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button wire:click="deleteCita({{ $cita->id_cita }})"
                                    onclick="return confirm('¿Seguro que deseas eliminar esta cita?')"
                                    class="text-red-600 hover:text-red-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="px-4 py-4 text-center text-gray-500">No hay citas para mostrar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    @if($modal)
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-8 relative">
            <h3 class="text-2xl font-semibold mb-6">{{ $editMode ? 'Editar Cita' : 'Nueva Cita' }}</h3>
            <form wire:submit.prevent="saveCita">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fecha Solicitada *</label>
                        <input type="date" wire:model.defer="fecha_solicitada" class="mt-1 block w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring @error('fecha_solicitada') border-red-500 @enderror">
                        @error('fecha_solicitada') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fecha Deseada *</label>
                        <input type="date" wire:model.defer="fecha_deseada" class="mt-1 block w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring @error('fecha_deseada') border-red-500 @enderror">
                        @error('fecha_deseada') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Hora *</label>
                        <input type="time" wire:model.defer="hora" class="mt-1 block w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring @error('hora') border-red-500 @enderror">
                        @error('hora') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Motivo *</label>
                        <input type="text" wire:model.defer="motivo" class="mt-1 block w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring @error('motivo') border-red-500 @enderror">
                        @error('motivo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Estado *</label>
                        <select wire:model.defer="estado" class="mt-1 block w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring @error('estado') border-red-500 @enderror">
                            <option value="">Seleccionar...</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="atendida">Atendida</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                        @error('estado') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Observaciones</label>
                        <input type="text" wire:model.defer="observaciones" class="mt-1 block w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring @error('observaciones') border-red-500 @enderror">
                        @error('observaciones') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Paciente *</label>
                        <select wire:model.defer="id_paciente" class="mt-1 block w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring @error('id_paciente') border-red-500 @enderror">
                            <option value="">Seleccionar...</option>
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id_paciente }}">{{ $paciente->nombre_completo }}</option>
                            @endforeach
                        </select>
                        @error('id_paciente') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Médico *</label>
                        <select wire:model.defer="id_medico" class="mt-1 block w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring @error('id_medico') border-red-500 @enderror">
                            <option value="">Seleccionar...</option>
                            @foreach($medicos as $medico)
                                <option value="{{ $medico->id_medico }}">{{ $medico->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_medico') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mt-8 flex justify-end gap-2">
                    <button type="button" wire:click="$set('modal', false)" class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancelar</button>
                    <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">{{ $editMode ? 'Actualizar' : 'Crear' }}</button>
                </div>
            </form>
            <button wire:click="$set('modal', false)" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
        </div>
    </div>
    @endif
</div>
