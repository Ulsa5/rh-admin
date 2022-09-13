<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectTypeController extends Controller
{
    
    public function index()
    {
        $projecttypes = ProjectType::all();

        return view('admin.projecttypes.index', compact('projecttypes'));
    }
    
    public function create()
    {
            return view('admin.projecttypes.create');
    }
    
    public function store(Request $request)
    {
        $projecttype = new ProjectType();

        $projecttype->name = $request->name;
        $projecttype->save();

        return Redirect::to('admin/projecttypes')
        ->with('alta','ok')
        ->with('notice', 'Tipo de Proyecto agregado correctamente.');
    }
    
    public function show(ProjectType $projectType)
    {
        //
    }
    
    public function edit(ProjectType $projecttype)
    {
        return view('admin.projecttypes.edit', compact('projecttype'));
    }
    
    public function update(Request $request, ProjectType $projecttype)
    {
        $projecttype->name = $request->name;
        $projecttype->save();

        return Redirect::to('admin/projecttypes')
        ->with('edited','ok')
        ->with('notice', 'Tipo de Projecto actualizado correctamente.');
    }
    
    public function destroy(ProjectType $projecttype)
    {
        $projecttype->delete();
        
        return Redirect::to('admin/projecttypes')
        ->with('eliminar','ok')
        ->with('notice', 'Información del Tipo de Proyecto eliminada correctamente.');
    }
}
