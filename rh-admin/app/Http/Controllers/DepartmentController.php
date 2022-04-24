<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.departments.create');

    }
    
    public function store(Request $request)
    {
        $department = new Department();

        $department->code = $request->code;
        $department->name = $request->name;
        $department->save();

        return Redirect::to('admin/departments')
        ->with('alta','ok')
        ->with('notice', 'Información de la empresa agregada correctamente.');
    }

    public function show(Department $department)
    {
        //
    }
    
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $department->code = $request->code;
        $department->name = $request->name;
        $department->save();

        return Redirect::to('admin/departments')
        ->with('edited','ok')
        ->with('notice', 'Información de la empresa actualizada correctamente.');

    }
    
    public function destroy(Department $department)
    {
        $department->delete();
        
        return Redirect::to('admin/departments')
        ->with('eliminar','ok')
        ->with('notice', 'Información de la empresa eliminada correctamente.');
    }
}
