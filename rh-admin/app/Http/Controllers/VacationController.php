<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VacationController extends Controller
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
        $vacation = new Vacation();

        $vacation->date = $request->date;
        $vacation->period = $request->period;
        $vacation->comment = $request->comment;
        $vacation->employee_id = $request->employee_id;
        // dd($vacation);
        $vacation->save();
        
        return Redirect::to('admin/employees/'.$request->employee_id)
        ->with('alta','ok')
        ->with('notice', 'Periodo vacacional agregado correctamente.');
    }
    
    public function show(Vacation $vacation)
    {
        //
    }
    
    public function edit(Vacation $vacation)
    {
        return view('admin.vacations.edit', compact('vacation'));
        
    }
    
    public function update(Request $request, Vacation $vacation)
    {
        $vacation->date = $request->date;
        $vacation->period = $request->period;
        $vacation->comment = $request->comment;
        $vacation->employee_id = $request->employee_id;
        // dd($vacation);
        $vacation->save();

        return Redirect::to('admin/employees/'.$request->employee_id)
        ->with('edited','ok')
        ->with('notice', 'Periodo vacacional actualizado correctamente.');
    }
    
    public function destroy(Vacation $vacation)
    {
        dd($vacation);
        $vacation->delete();
        
        return Redirect::to('admin/employees/'.$vacation->employee_id)
        ->with('eliminar','ok')
        ->with('notice', 'Periodo vacacional eliminado correctamente.');
    }
}
