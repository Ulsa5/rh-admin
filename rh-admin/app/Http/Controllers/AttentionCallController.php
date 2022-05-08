<?php

namespace App\Http\Controllers;

use App\Models\AttentionCall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AttentionCallController extends Controller
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
        $attentionCall = new AttentionCall();

        $attentionCall->date = $request->date;
        $attentionCall->reason = $request->reason;
        $attentionCall->comment = $request->comment;
        $attentionCall->employee_id = $request->employee_id;
        // dd($attentionCall);
        $attentionCall->save();
        
        return Redirect::to('admin/employees/'.$request->employee_id)
        ->with('alta','ok')
        ->with('notice', 'Llamada de atención agregada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttentionCall  $attentionCall
     * @return \Illuminate\Http\Response
     */
    public function show(AttentionCall $attentionCall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttentionCall  $attentionCall
     * @return \Illuminate\Http\Response
     */
    public function edit(AttentionCall $attentionCall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttentionCall  $attentionCall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttentionCall $attentionCall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttentionCall  $attentionCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttentionCall $attentionCall)
    {
        //
    }
}
