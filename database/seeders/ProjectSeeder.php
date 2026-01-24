<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            ['title' => 'Gestión de Biblioteca', 'description' => 'Sistema de préstamos', 'url' => 'https://github.com'],
            ['title' => 'E-commerce Laravel', 'description' => 'Tienda online completa', 'url' => 'https://github.com'],
        ]);
    }
}
