<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\IgssAfilliation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IgssAfilliationController extends Controller
{
    
    public function index()
    {
        $igssafilliations = IgssAfilliation::all()->sortBy('company_id');

        return view('admin.igssafilliations.index', compact('igssafilliations'));
    }
    
    public function create()
    {
        $companies = Company::all();
        return view('admin.igssafilliations.create', compact('companies'));
    }
    
    public function store(Request $request)
    {
        $igssafilliation = new IgssAfilliation();

        $igssafilliation->number = $request->number;
        $igssafilliation->filial = $request->filial;
        $igssafilliation->company_id = $request->company;
        $igssafilliation->save();

        return Redirect::to('admin/igssafilliations')
        ->with('alta','ok')
        ->with('notice', 'Información de la filial agregada correctamente.');
    }
    
    public function show(IgssAfilliation $igssAfilliation)
    {
        //
    }
    
    public function edit(IgssAfilliation $igssafilliation)
    {
        $companies = Company::all();
        return view('admin.igssafilliations.edit', compact('igssafilliation','companies'));
    }
    
    public function update(Request $request, IgssAfilliation $igssafilliation)
    {
        $igssafilliation->number = $request->number;
        $igssafilliation->filial = $request->filial;
        $igssafilliation->company_id = $request->company;
        $igssafilliation->save();

        return Redirect::to('admin/igssafilliations')
        ->with('edited','ok')
        ->with('notice', 'Información de la filial actualizada correctamente.');
    }

    public function destroy(IgssAfilliation $igssafilliation)
    {
        $igssafilliation->delete();
        
        return Redirect::to('admin/igssafilliations')
        ->with('eliminar','ok')
        ->with('notice', 'Información de la filial eliminada correctamente.');
    }
}
