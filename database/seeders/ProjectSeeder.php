<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiamos la tabla por si acaso
        DB::table('projects')->truncate();

        DB::table('projects')->insert([
            [
                'title' => 'Sistema de Biblioteca',
                'description' => 'Gestión completa de libros y préstamos.',
                'url' => 'https://github.com/laravel/laravel',
                'created_at' => now(),
            ],
            [
                'title' => 'API E-commerce',
                'description' => 'Backend escalable para tienda online.',
                'url' => 'https://github.com/laravel/framework',
                'created_at' => now(),
            ],
            [
                'title' => 'Gestor de Tareas',
                'description' => 'Aplicación tipo Kanban para gestión de equipos.',
                'url' => 'https://github.com',
                'created_at' => now(),
            ],
            [
                'title' => 'Blog Personal',
                'description' => 'Sistema de gestión de contenidos CMS.',
                'url' => null,
                'created_at' => now(),
            ],
        ]);
    }
}
