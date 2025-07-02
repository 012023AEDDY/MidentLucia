<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // 1. Primero, crea los roles
    $this->call([
        RolUsuarioSeeder::class,
    ]);

    // 2. Luego, crea los usuarios con el id_rol correcto
    if (!User::where('email', 'milkonmmaniccama@gmail.com')->exists()) {
        User::create([
            'name' => 'milkon mamani',
            'email' => 'milkonmmaniccama@gmail.com',
            'password' => bcrypt('12345678'),
            'id_rol' => 1, 
        ]);
         User::factory()->create([
            'name' => 'diana huanca',
            'email' => 'd.vane.huancacruz@gmail.com',
            'password' => bcrypt('1234'),
        ]);
    }

    if (!User::where('email', 'secretaria@gmail.com')->exists()) {
        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@gmail.com',
            'password' => bcrypt('12345secretaria'),
            'id_rol' => 2, 
        ]);
    }

    // 3. Luego, los demás seeders
    $this->call([
        PacienteSeeder::class,
        MedicoSeeder::class,
        CitaSeeder::class,
        ComentarioSeeder::class,
    ]);
}
}
