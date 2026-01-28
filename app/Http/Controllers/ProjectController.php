<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProjectController extends Controller
{
    public function index()
    {
        // Paginamos los proyectos (5 por página)
        $projects = Project::paginate(5);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'url' => 'nullable|url'
        ]);

        // Guardamos directamente los datos validados (sin traducción)
        Project::create($validated);

        return redirect()->route('projects.index')
            ->with('success', __('Project created successfully'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'url' => 'nullable|url'
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')
            ->with('success', __('Project updated successfully'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', __('Project deleted successfully'));
    }
}
