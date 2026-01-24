<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\Project;
use Illuminate\Support\Facades\Session;

Route::get('lang/{locale}', function ($locale) {
    // Validar que el idioma sea uno de los permitidos
    if (in_array($locale, ['en', 'es', 'fr'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back(); // Volver a la página donde estaba
})->name('lang');

// Página Principal
Route::get('/', function () {
    return view('main');
})->name('main');

// Rutas Autenticadas
Route::middleware(['auth', 'verified'])->group(function () {

    // Proyectos (Cargados por Seeder)
    Route::get('/projects', function () {
        $projects = Project::all();
        return view('projects', compact('projects'));
    })->name('projects');

    // CRUD Alumnos (Resource)
    Route::resource('students', StudentController::class);
});

require __DIR__.'/auth.php';
