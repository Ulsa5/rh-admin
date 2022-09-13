<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SuspensionController extends Controller
{
    
    public function index()
    {
        //
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        $suspension = new Suspension();

        $suspension->date = $request->date;
        $suspension->reason = $request->reason;
        $suspension->comment = $request->comment;
        $suspension->employee_id = $request->employee_id;
        // dd($suspension);
        $suspension->save();
        
        return Redirect::to('admin/employees/'.$request->employee_id)
        ->with('alta','ok')
        ->with('notice', 'Suspensión agregada correctamente.');
    }
    
    public function show(Suspension $suspension)
    {
        //
    }
    
    public function edit(Suspension $suspension)
    {
        return view('admin.suspensions.edit', compact('suspension'));
    }
    
    public function update(Request $request, Suspension $suspension)
    {
        $suspension->date = $request->date;
        $suspension->reason = $request->reason;
        $suspension->comment = $request->comment;
        $suspension->employee_id = $request->employee_id;
        // dd($suspension);
        $suspension->save();

        return Redirect::to('admin/employees/'.$request->employee_id)
        ->with('edited','ok')
        ->with('notice', 'Suspensión actualizada correctamente.');
    }
    
    public function destroy(Suspension $suspension)
    {
        $suspension->delete();
        
        return Redirect::to('admin/employees/'.$suspension->employee_id)
        ->with('eliminar','ok')
        ->with('notice', 'Suspensión eliminada correctamente.');
    }
}
