<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolUsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rol_usuarios')->insert([
            [
                'nombre_rol' => 'Administrador',
                'descripcion' => 'Acceso total al sistema',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_rol' => 'Secretaria',
                'descripcion' => 'Gestión de citas y pacientes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_rol' => 'Odontólogo',
                'descripcion' => 'Acceso a historia clínica y programación de citas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
