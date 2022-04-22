<?php

namespace App\Http\Controllers;

use App\Models\BankAccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BankAccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankAccountTypes = BankAccountType::all();
        
        return view('acctype.index', compact('bankAccountTypes'));
    }
    
    public function create()
    {
        return view('acctype.create');
    }
    
    public function store(Request $request)
    {
        $bankAccountType = new BankAccountType();

        $bankAccountType->account_type = $request->cuenta;
        $bankAccountType->save();

        return Redirect::to('acctype')->with('alta','ok')->with('notice', 'Tipo de cuenta agregado correctamente.');
    }
    
    public function show(BankAccountType $bankAccountType)
    {
        //
    }

    
    public function edit(BankAccountType $acctype)
    {
        return view('acctype.edit', compact('acctype'));
    }
    
    public function update(Request $request, BankAccountType $acctype)
    {
        $acctype->account_type = $request->cuenta;
        $acctype->save();

        return Redirect::to('acctype')->with('edited','ok')->with('notice', 'Tipo de Cuenta actualizado correctamente.');
    }
    
    public function destroy(BankAccountType $acctype)
    {
        $acctype->delete();
        
        return Redirect::to('acctype')->with('eliminar','ok')->with('notice', 'Tipo de cuenta eliminado correctamente.');
    }
}
