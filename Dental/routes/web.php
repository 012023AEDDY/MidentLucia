<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\GestionMedicos;
use App\Livewire\GestionPacientes;
use App\Livewire\GestionRolUsuario;
use App\Livewire\GestionCitas;
use App\Livewire\GestionComentarios;
use App\Livewire\RegistroPaciente;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::view('/', 'inicio')->name('inicio');
Route::view('/acerca de', 'acerca de')->name('acerca de');
Route::view('/servicios', 'servicios')->name('servicios');
Route::view('/especialistas', 'especialistas')->name('especialistas');
Route::view('/testimonios', 'testimonios')->name('testimonios');
Route::view('/contactenos', 'contactenos')->name('contactenos');
Route::get('/login', function () {
    return view('login');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Route::get('/pacientes', GestionPacientes::class)->name('pacientes');
    Route::get('/medicos', GestionMedicos::class)->name('medicos');
    Route::get('/roles', GestionRolUsuario::class)->name('roles');
    Route::get('/citas', GestionCitas::class)->name('citas');;
    Route::get('/gestion-comentarios', GestionComentarios::class)->name('gestion-comentarios');
});

Route::get('/registrar-paciente', RegistroPaciente::class)->name('registro.paciente');

require __DIR__.'/auth.php';
