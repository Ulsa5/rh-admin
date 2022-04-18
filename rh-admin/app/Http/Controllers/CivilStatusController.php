<?php

namespace App\Http\Controllers;

use App\Models\CivilStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class CivilStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //return "Vista index";
        // $civilstatuses = CivilStatus::all();
        // //return  $civilstatuses;

        // return response()->json($civilstatuses);
        $civilstatuses = CivilStatus::all();

        return view('civilstatus.index', compact('civilstatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('civilstatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $civilstatus = new CivilStatus();

        $civilstatus->name = $request->estadocivil;
        $civilstatus->comment = $request->comentario;
        $civilstatus->save();

        return Redirect::to('civilstatus')->with('notice', 'Estado Civil agregado correctamente.');

        // return redirect()->route('civilstatus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CivilStatus  $civilStatus
     * @return \Illuminate\Http\Response
     */
    public function show(CivilStatus $civilStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CivilStatus  $civilStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(CivilStatus $civilStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CivilStatus  $civilStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CivilStatus $civilStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CivilStatus  $civilStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(CivilStatus $civilStatus)
    {
        //
    }
}
