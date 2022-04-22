<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BloodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloods = Blood::all();
        
        return view('blood.index', compact('bloods'));
    }
    
    public function create()
    {
        return view('blood.create');
    }
    
    public function store(Request $request)
    {
        $blood = new Blood();

        $blood->name = $request->blood;
        $blood->comment = $request->comentario;
        $blood->save();

        return Redirect::to('blood')->with('alta','ok')->with('notice', 'Tipo de sangre agregado correctamente.');
    }
    
    public function show(Blood $blood)
    {
        //
    }
    
    public function edit(Blood $blood)
    {
        return view('blood.edit', compact('blood'));
    }
    
    public function update(Request $request, Blood $blood)
    {
        $blood->name = $request->blood;
        $blood->comment = $request->comentario;
        $blood->save();

        return Redirect::to('blood')->with('edited','ok')->with('notice', 'Tipo de Sangre actualizado correctamente.');
    }
    
    public function destroy(Blood $blood)
    {
        $blood->delete();
        
        return Redirect::to('blood')->with('eliminar','ok')->with('notice', 'Tipo de Sangre eliminado correctamente.');
    }
}
