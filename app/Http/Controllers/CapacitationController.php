<?php

namespace App\Http\Controllers;

use App\Models\Capacitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CapacitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $capacitation = new Capacitation();

        $capacitation->date = $request->capacitationDate;
        $capacitation->instructor = $request->instructor;
        $capacitation->comment = $request->capacitationComment;
        $capacitation->employee_id = $request->employee_id;
        $capacitation->capacitation_type_id = $request->capacitationType;
        $capacitation->save();
        
        return Redirect::to('admin/employees/'.$request->employee_id)
        ->with('alta','ok')
        ->with('notice', 'Información de Capacitación agregada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Capacitation  $capacitation
     * @return \Illuminate\Http\Response
     */
    public function show(Capacitation $capacitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Capacitation  $capacitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Capacitation $capacitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Capacitation  $capacitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capacitation $capacitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Capacitation  $capacitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capacitation $capacitation)
    {
        //
    }
}
