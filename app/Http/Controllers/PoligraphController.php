<?php

namespace App\Http\Controllers;

use App\Models\Poligraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PoligraphController extends Controller
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
    
    public function store(Request $request)
    {
        $poligraph = new Poligraph();

        $poligraph->date = $request->date;
        $poligraph->result = $request->result;
        $poligraph->comment = $request->comment;
        $poligraph->poligrapher = $request->poligrapher;
        $poligraph->employee_id = $request->employee_id;
        $poligraph->poligraph_type_id = $request->poligraphtype;
        // dd($poligraph);
        $poligraph->save();

        return Redirect::to('admin/employees/'.$request->employee_id)
        ->with('alta','ok')
        ->with('notice', 'Resultado poligráfico agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poligraph  $poligraph
     * @return \Illuminate\Http\Response
     */
    public function show(Poligraph $poligraph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poligraph  $poligraph
     * @return \Illuminate\Http\Response
     */
    public function edit(Poligraph $poligraph)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poligraph  $poligraph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poligraph $poligraph)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poligraph  $poligraph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poligraph $poligraph)
    {
        //
    }
}
