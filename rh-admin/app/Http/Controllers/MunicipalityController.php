<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MunicipalityController extends Controller
{
    
    public function index()
    {
        $municipalities = Municipality::all()->sortBy('department_id');

        return view('admin.municipalities.index', compact('municipalities'));
    }

    public function create()
    {
        
        $departments = Department::all();
        return view('admin.municipalities.create', compact('departments'));
    }
    
    public function store(Request $request)
    {
        $municipality = new Municipality();

        $municipality->code = $request->code;
        $municipality->name = $request->name;
        $municipality->department_id = $request->department;
        $municipality->save();

        return Redirect::to('admin/municipalities')
        ->with('alta','ok')
        ->with('notice', 'Información del municipio agregada correctamente.');
    }
    
    public function show(Municipality $municipality)
    {
        //
    }
    
    public function edit(Municipality $municipality)
    {
        $departments = Department::all();
        return view('admin.municipalities.edit', compact('municipality','departments'));
    }

    public function update(Request $request, Municipality $municipality)
    {
        $municipality->code = $request->code;
        $municipality->name = $request->name;
        $municipality->department_id = $request->department;
        $municipality->save();

        return Redirect::to('admin/municipalities')
        ->with('edited','ok')
        ->with('notice', 'Información del municipio actualizada correctamente.');
    }
    
    public function destroy(Municipality $municipality)
    {
        $municipality->delete();
        
        return Redirect::to('admin/municipalities')
        ->with('eliminar','ok')
        ->with('notice', 'Información del municipio eliminada correctamente.');
    }
}
