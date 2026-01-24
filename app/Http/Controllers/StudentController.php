<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Paginación obligatoria
        $students = Student::paginate(5);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // 1. Validamos todos los campos (incluido 'phone' que te faltaba)
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable', // Añadimos esto para que validated() lo coja
        ]);

        // 2. Usamos $validated en lugar de $request->all()
        // Esto crea el alumno SOLO con name, email y phone (sin el _token)
        Student::create($validated);

        return redirect()->route('students.index')->with('success', __('Student created successfully'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email', // Aquí quitamos unique para evitar error al editar el mismo email
            'phone' => 'nullable',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', __('Student updated successfully'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', __('Student deleted successfully'));
    }
}
