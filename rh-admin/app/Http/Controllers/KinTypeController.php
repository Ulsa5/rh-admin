<?php

namespace App\Http\Controllers;

use App\Models\KinType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KinTypeController extends Controller
{
    
    public function index()
    {
        $kintypes = KinType::all()->sortBy('name');

        return view('admin.kintypes.index', compact('kintypes'));
    }
    
    public function create()
    {
        return view('admin.kintypes.create');
    }
    
    public function store(Request $request)
    {
        $kintype = new KinType();

        $kintype->name = $request->name;
        $kintype->save();

        return Redirect::to('admin/kintypes')
        ->with('alta','ok')
        ->with('notice', 'Información del parentesco agregada correctamente.');
    }
    
    public function show(KinType $kinType)
    {
        //
    }
    
    public function edit(KinType $kintype)
    {
        return view('admin.kintypes.edit', compact('kintype'));
    }
    
    public function update(Request $request, KinType $kintype)
    {
        $kintype->name = $request->name;
        $kintype->save();

        return Redirect::to('admin/kintypes')
        ->with('edited','ok')
        ->with('notice', ('Información del parentesco actualizada correctamente.'));
    }
    
    public function destroy(KinType $kintype)
    {
        $kintype->delete();
        
        return Redirect::to('admin/kintypes')
        ->with('eliminar','ok')
        ->with('notice', 'Información del parentesco eliminada correctamente.');
    }
}
