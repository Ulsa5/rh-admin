<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }
    
    public function create()
    {
        return view('admin.companies.create');
    }
    
    public function store(Request $request)
    {
        $company = new Company();

        $company->name = $request->name;
        $company->nit = $request->nit;
        $company->save();

        return Redirect::to('admin/companies')
        ->with('alta','ok')
        ->with('notice', 'Información de la empresa agregada correctamente.');

    }
    
    public function show(Company $company)
    {
        //
    }
    
    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }
    
    public function update(Request $request, Company $company)
    {
        $company->name = $request->name;
        $company->nit = $request->nit;
        $company->save();

        return Redirect::to('admin/companies')
        ->with('edited','ok')
        ->with('notice', 'Información de la empresa actualizada correctamente.');
   
    }
    
    public function destroy(Company $company)
    {
        $company->delete();
        
        return Redirect::to('admin/companies')
        ->with('eliminar','ok')
        ->with('notice', 'Información de la empresa eliminada correctamente.');
    
    }
}
