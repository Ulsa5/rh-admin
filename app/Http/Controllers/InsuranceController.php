<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InsuranceController extends Controller
{
    
    public function index()
    {
        $insurances = Insurance::all()->sortBy('company_id');

        return view('admin.insurances.index', compact('insurances'));
    }
    
    public function create()
    {
        $companies = Company::all();
        return view('admin.insurances.create', compact('companies'));
    }
    
    public function store(Request $request)
    {
        $insurance = new Insurance();

        $insurance->name = $request->name;
        $insurance->company_id = $request->company;
        $insurance->save();

        return Redirect::to('admin/insurances')
        ->with('alta','ok')
        ->with('notice', 'Información del seguro agregada correctamente.');
    }
    
    public function show(Insurance $insurance)
    {
        //
    }
    
    public function edit(Insurance $insurance)
    {
        $companies = Company::all();
        return view('admin.insurances.edit', compact('insurance','companies'));
    }
    
    public function update(Request $request, Insurance $insurance)
    {
        $insurance->name = $request->name;
        $insurance->company_id = $request->company;
        $insurance->save();

        return Redirect::to('admin/insurances')
        ->with('edited','ok')
        ->with('notice', 'Información del seguro actualizada correctamente.');
    }
    
    public function destroy(Insurance $insurance)
    {
        $insurance->delete();
        
        return Redirect::to('admin/insurances')
        ->with('eliminar','ok')
        ->with('notice', 'Información del seguro eliminada correctamente.');
    }
}
