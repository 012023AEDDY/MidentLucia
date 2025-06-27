<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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
});

require __DIR__.'/auth.php';
