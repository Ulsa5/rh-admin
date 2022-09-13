<?php

namespace App\Http\Controllers;

use App\Models\Genders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GendersController extends Controller
{
    
    public function index()
    {
        $genders = Genders::all();

        return view('admin.genders.index',compact('genders'));
    }

    
    public function create()
    {
        return view('admin.genders.create');
    }

    
    public function store(Request $request)
    {
        $gender = new Genders();

        $gender->name = $request->genero;
        $gender->save();
        
        return Redirect::to('admin/genders')
        ->with('alta','ok')
        ->with('notice', 'Género agregado correctamente.');
    }
    
    public function show(Genders $genders)
    {
        //
    }
    
    public function edit(Genders $gender)
    {
        return view('admin.genders.edit', compact('gender'));
    }
    
    public function update(Request $request, Genders $gender)
    {
        $gender->name = $request->genero;
        $gender->save();

        return Redirect::to('admin/genders')
        ->with('edited','ok')
        ->with('notice', 'Género actualizado correctamente.');
    
    }
    
    public function destroy(Genders $gender)
    {
        $gender->delete();

        return Redirect::to('admin/genders')
        ->with('eliminar','ok')
        ->with('notice', 'Género eliminado correctamente.');
    
    }
}
