<?php

namespace App\Http\Controllers;

use App\Models\CivilStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CivilStatusController extends Controller
{


    public function index(Request $request)
    {
        
        // $civilstatuses = CivilStatus::latest()->take(10)->get();
        $civilstatuses = CivilStatus::all();
        // $civilstatuses = CivilStatus::orderBy('id','desc')->paginate(5);

        return view('admin.civilstatuses.index', compact('civilstatuses'));
    }


    public function create()
    {
        //
        return view('admin.civilstatuses.create');
    }


    public function store(Request $request)
    {
        $civilstatus = new CivilStatus();

        $civilstatus->name = $request->estadocivil;
        $civilstatus->comment = $request->comentario;
        $civilstatus->save();

        return Redirect::to('admin/civilstatuses')
        ->with('alta','ok')
        ->with('notice', 'Estado Civil agregado correctamente.');
    }


    public function show(CivilStatus $civilStatus)
    {
        //
    }

    public function edit(CivilStatus $civilstatus)
    {
        return view('admin.civilstatuses.edit', compact('civilstatus'));
    }


    public function update(Request $request, CivilStatus $civilstatus)
    {

        $civilstatus->name = $request->estadocivil;
        $civilstatus->comment = $request->comentario;
        $civilstatus->save();

        return Redirect::to('admin/civilstatuses')
        ->with('edited','ok')
        ->with('notice', 'Estado Civil actualizado correctamente.');
    }


    public function destroy(CivilStatus $civilstatus)
    {
        $civilstatus->delete();

        // return Redirect::to('civilstatus')->with('notice', 'Estado Civil eliminado correctamente.');
        return Redirect::to('admin/civilstatuses')
        ->with('eliminar','ok')
        ->with('notice', 'Estado Civil eliminado correctamente.');
    }
}
