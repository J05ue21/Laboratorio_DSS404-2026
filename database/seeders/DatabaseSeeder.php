<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Specialty;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        //agregando Epecialidades medicas
        $pediatria = Specialty::create([
            'name' => 'Pediatria',
            'description' => 'Atención médica integral para bebés, niños y adolescentes'
        ]);
        
        $cardiologia = Specialty::create([
            'name' => 'Cardiologia',
            'description' => 'Especialidad encargada del estudio y tratamiento de enfermedades del corazón'
        ]);
        
        $medicinaGeneral = Specialty::create([
            'name' => 'Medicina General',
            'description' => 'Atención médica primaria y preventiva para la familia'
        ]);

        $nefrologia = Specialty::create([
            'name' => 'Nefrologia',
            'description' => 'Medicina interna, dedicada al estudio, prevención, diagnóstico y tratamiento de las enfermedades de los riñones y sus funciones'
        ]);

        //algunos usuarios con su respectivo Rol
        User::create([
            'name' => 'Elias Salazar',
            'email' => 'elias.salazar@medicos.com',
            'password' => Hash::make('passwordDSS'), // Encriptación segura nativa
            'role' => 'doctor'
        ]);

        User::create([
            'name' => 'Allison Merino',
            'email' => 'allison.merino@medicos.com',
            'password' => Hash::make('passwordDSS'),
            'role' => 'doctor'
        ]);

        User::create([
            'name' => 'Evelyn Huezo',
            'email' => 'evelyn.hueso@medicos.com',
            'password' => Hash::make('passwordDSS'),
            'role' => 'doctor'
        ]);


        User::create([
            'name' => 'Eduardo Ortiz',
            'email' => 'eduardo@alumno.udb.edu.sv',
            'password' => Hash::make('passwordDSS'),
            'role' => 'paciente'
        ]);

        User::create([
            'name' => 'David Gomez',
            'email' => 'david.gomez@gmail.com',
            'password' => Hash::make('passwordDSS'),
            'role' => 'paciente'
        ]);

        User::create([
            'name' => 'Marielos Orellana',
            'email' => 'marielos.orellana@gmail.com',
            'password' => Hash::make('passwordDSS'),
            'role' => 'paciente'
        ]);
    }
}