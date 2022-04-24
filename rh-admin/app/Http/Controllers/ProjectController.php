<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $projects = Project::all();
        $projecttypes = ProjectType::all();

        return view('admin.projects.create', compact('projects', 'projecttypes'));
    }
    
    public function store(Request $request)
    {
        $projects = new Project();

        $projects->code = $request->code;
        $projects->name = $request->name;
        $projects->address = $request->address;
        $projects->project_type_id = $request->projecttype;
        $projects->save();

        return Redirect::to('admin/projects')
        ->with('alta','ok')
        ->with('notice', 'Proyecto agregado correctamente.');
    }
    
    public function show(Project $project)
    {
        //
    }
    
    public function edit(Project $project)
    {
        $projecttypes = ProjectType::all();
        return view('admin.projects.edit', compact('project','projecttypes'));
    }
    
    public function update(Request $request, Project $project)
    {
        $project->code = $request->code;
        $project->name = $request->name;
        $project->project_type_id = $request->projecttype;
        $project->save();

        return Redirect::to('admin/projects')
        ->with('edited','ok')
        ->with('notice', 'Proyecto actualizado correctamente.');
    }
    
    public function destroy(Project $project)
    {
        $project->delete();
        
        return Redirect::to('admin/projects')
        ->with('eliminar','ok')
        ->with('notice', 'Información del Proyecto eliminada correctamente.');
    }
}
