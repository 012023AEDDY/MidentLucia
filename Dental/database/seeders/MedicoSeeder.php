<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO medicos (id_medico, nombre, telefono, email, foto, descripcion, estado) VALUES
        (1, 'Evaristo de Prieto', '941681838', 'evaristo.prieto@example.com', '/img/medico01.jpg', 'Especialista en Cirugía Maxilofacial con más de 8 años de experiencia.', 'activo'),
        (2, 'Calixta Bosch Batlle', '974273970', 'calixta.batlle@example.com', '/img/manuel.png', 'Especialista en Endodoncia con más de 7 años de experiencia.', 'inactivo'),
        (3, 'Herberto Mancebo Barral', '963900633', 'herberto.barral@example.com', '/img/medico03.jpg', 'Especialista en Radiología Dental con más de 14 años de experiencia.', 'activo'),
        (4, 'Juan Bautista del Lloret', '917898318', 'juan.lloret@example.com', '/img/medico04.jpg', 'Especialista en Periodoncia con más de 16 años de experiencia.', 'activo'),
        (5, 'Severiano Camino Juárez', '933174640', 'severiano.juarez@example.com', '/img/medico05.jpg', 'Especialista en Ortodoncia con más de 13 años de experiencia.', 'activo'),
        (6, 'Albert Juliá', '913441299', 'albert.julia@example.com', '/img/medico01.jpg', 'Especialista en Cirugía Maxilofacial con más de 13 años de experiencia.', 'activo'),
        (7, 'Cleto Cózar-Menendez', '951587357', 'cleto.cozar-menendez@example.com', '/img/medico02.jpg', 'Especialista en Cirugía Maxilofacial con más de 16 años de experiencia.', 'inactivo'),
        (8, 'Mauricio Toño Perales Bolaños', '991316063', 'mauricio.bolaños@example.com', '/img/medico03.jpg', 'Especialista en Implantología con más de 17 años de experiencia.', 'activo'),
        (9, 'Evangelina Nazaret Pons Velasco', '933862593', 'evangelina.velasco@example.com', '/img/medico04.jpg', 'Especialista en Periodoncia con más de 20 años de experiencia.', 'activo'),
        (10, 'Chuy de Sáenz', '983502844', 'chuy.saenz@example.com', '/img/medico05.jpg', 'Especialista en Cirugía Maxilofacial con más de 5 años de experiencia.', 'activo'),
        (11, 'Arsenio Marín-Aguilar', '986821771', 'arsenio.marin-aguilar@example.com', '/img/medico01.jpg', 'Especialista en Cirugía Maxilofacial con más de 11 años de experiencia.', 'activo'),
        (12, 'Luciano Pastor Mesa Verdugo', '990384671', 'luciano.verdugo@example.com', '/img/medico02.jpg', 'Especialista en Cirugía Maxilofacial con más de 18 años de experiencia.', 'activo'),
        (13, 'Hilario Roda', '941302955', 'hilario.roda@example.com', '/img/medico03.jpg', 'Especialista en Cirugía Maxilofacial con más de 13 años de experiencia.', 'activo'),
        (14, 'Elvira Irene Sanmiguel Cuéllar', '915803369', 'elvira.cuellar@example.com', '/img/medico04.jpg', 'Especialista en Ortodoncia con más de 6 años de experiencia.', 'activo'),
        (15, 'Ezequiel del Aroca', '947639108', 'ezequiel.aroca@example.com', '/img/medico05.jpg', 'Especialista en Radiología Dental con más de 20 años de experiencia.', 'activo'),
        (16, 'Alonso Sevillano Lozano', '929469993', 'alonso.lozano@example.com', '/img/medico01.jpg', 'Especialista en Periodoncia con más de 7 años de experiencia.', 'activo'),
        (17, 'Luna Soto', '937201989', 'luna.soto@example.com', '/img/medico02.jpg', 'Especialista en Estética Dental con más de 13 años de experiencia.', 'activo'),
        (18, 'Blanca Ferrán Batlle', '968508773', 'blanca.batlle@example.com', '/img/medico03.jpg', 'Especialista en Patología Oral con más de 15 años de experiencia.', 'activo'),
        (19, 'Zaira Franco Sainz', '936670699', 'zaira.sainz@example.com', '/img/medico04.jpg', 'Especialista en Implantología con más de 8 años de experiencia.', 'activo'),
        (20, 'Cirino Pagès-Ruano', '940718336', 'cirino.pagès-ruano@example.com', '/img/medico05.jpg', 'Especialista en Cirugía Maxilofacial con más de 12 años de experiencia.', 'activo');
");
    }
}
