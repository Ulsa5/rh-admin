<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SectionController extends Controller
{
    
    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index', compact('sections'));
    }
    
    public function create()
    {
        return view('admin.sections.create');
    }
    
    public function store(Request $request)
    {
        $section = new Section();
        $section->name = $request->seccion;
        $section->save();
        
        return Redirect::to('admin/sections')
        ->with('alta','ok')
        ->with('notice', 'Departamento agregado correctamente.');
    }
    
    public function show(Section $section)
    {
        
    }
    
    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
        
    }
    
    public function update(Request $request, Section $section)
    {
        $section->name = $request->seccion;
        $section->save();

        return Redirect::to('admin/sections')
        ->with('edited','ok')
        ->with('notice', 'Información del departamento actualizado correctamente.');
    }
    
    public function destroy(Section $section)
    {
        $section->delete();
        
        return Redirect::to('admin/sections')
        ->with('eliminar','ok')
        ->with('notice', 'Información del departamento eliminada correctamente.');
    }
}
