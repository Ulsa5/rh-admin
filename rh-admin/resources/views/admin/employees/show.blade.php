@extends('layouts.base')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

@endsection

<div class="container">
    <h3 class="text-center mt-3">RH Admin</h3>
</div>

@section('content')

@if(Session::has('notice'))
<div class="container">
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('notice') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
</div>
@endif

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 text-center" style="font-style: italic">
                            <div align="center">
                                <img src="{{ asset('img/perfil.jpg') }}"  height="100%" width="10%"></img>
                            </div>
                            <h2>{{ $employee->name}}</h2>
                            <h5>Ficha del Empleado</h5>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <a href="{{ route('employees.index') }}" class="btn btn-primary">Listado de Empleados</a>
                    </div>
                </div>

                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-principal" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Datos Personales</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-familiares" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Datos Familiares</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-documentos" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Documentos</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-otros" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Otros</button>
                        </div>
                    </nav>

                      <div class="tab-content" id="nav-tabContent">

                        {{-- Datos Principales del Usuario --}}
                        <div class="tab-pane fade show active" id="nav-principal" role="tabpanel" aria-labelledby="nav-home-tab">
                            <h3>Datos Personales</h3>
                            <br>
                            <div class="mx-auto">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Fecha de Alta</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ date("d/m/Y", strtotime($employee->admission_date)) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Nombre completo</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">DPI</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->dpi }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Lugar de Nacimiento</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->municipality->name }}, {{ $employee->municipality->department->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Número de Carnet</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->carnet }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Fecha de Vencimiento del Carnet</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ date("d/m/Y", strtotime($employee->carnet_expiration)) }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Teléfono</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->telephone }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">NIT</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->nit }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">IRTRA</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->irtra }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Nivel de Estudios</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->educational_level }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Correo Electrónico</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Dirección</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->address }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Estado Civil</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->civilStatus->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Fecha de Nacimiento</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ date("d/m/Y", strtotime($employee->birthday)) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Lugar de Nacimiento</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->municipality->name }}, {{ $employee->municipality->department->name }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Número de Cuenta Bancaria</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->bank_account_number }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Tipo de Cuenta Bancaria</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->bankAccountType->account_type }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Banco</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->bank->name }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Empresa</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->company->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Puesto</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->job->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Proyecto</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->project->name }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Seguro de Vida</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->insurance->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Afiliación del IGSS</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->igssAfilliation->number }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Tipo de Sangre</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->blood->name }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Género (sexo)</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->gender->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- <div class="form-group">
                                            <label for="birth_date">Afiliación del IGSS</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->igssAfilliation->number }}" disabled>
                                        </div> --}}
                                    </div>
                                    <div class="col-md-4">
                                        {{-- <div class="form-group">
                                            <label for="birth_date">Tipo de Sangre</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->blood->name }}" disabled>
                                        </div> --}}
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        {{-- Datos familiares --}}
                        <div class="tab-pane fade" id="nav-familiares" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <h3>Datos Familiares</h3>
                            <br>

                            <div class="mx-auto">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Fecha de Alta</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ date("d/m/Y", strtotime($employee->admission_date)) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Nombre completo</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">DPI</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->dpi }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Lugar de Nacimiento</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->municipality->name }}, {{ $employee->municipality->department->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Número de Carnet</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->carnet }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Fecha de Vencimiento del Carnet</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ date("d/m/Y", strtotime($employee->carnet_expiration)) }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Teléfono</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->telephone }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">NIT</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->nit }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">IRTRA</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->irtra }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Nivel de Estudios</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->educational_level }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Correo Electrónico</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Dirección</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->address }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Estado Civil</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->civilStatus->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Fecha de Nacimiento</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ date("d/m/Y", strtotime($employee->birthday)) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Lugar de Nacimiento</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->municipality->name }}, {{ $employee->municipality->department->name }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Número de Cuenta Bancaria</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->bank_account_number }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Tipo de Cuenta Bancaria</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->bankAccountType->account_type }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Banco</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->bank->name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>

                        {{-- Documentos --}}
                        <div class="tab-pane fade" id="nav-documentos" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <h3>Documentos</h3>
                            <br>

                            <div class="mx-auto">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Fecha de Alta</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ date("d/m/Y", strtotime($employee->admission_date)) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Nombre completo</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">DPI</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->dpi }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Lugar de Nacimiento</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->municipality->name }}, {{ $employee->municipality->department->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Número de Carnet</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->carnet }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Fecha de Vencimiento del Carnet</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ date("d/m/Y", strtotime($employee->carnet_expiration)) }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Teléfono</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->telephone }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">NIT</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->nit }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">IRTRA</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->irtra }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Nivel de Estudios</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->educational_level }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Correo Electrónico</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Dirección</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->address }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Estado Civil</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->civilStatus->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Fecha de Nacimiento</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ date("d/m/Y", strtotime($employee->birthday)) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Lugar de Nacimiento</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->municipality->name }}, {{ $employee->municipality->department->name }}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dni">Número de Cuenta Bancaria</label>
                                            <input type="text" class="form-control" id="dni" name="dni" value="{{ $employee->bank_account_number }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Tipo de Cuenta Bancaria</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->bankAccountType->account_type }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="birth_date">Banco</label>
                                            <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ $employee->bank->name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        {{-- Fin Documentos --}}

                        {{-- Otros --}}
                        <div class="tab-pane fade" id="nav-otros" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <h3>Otros</h3>
                            <br>

                            <div class="mx-auto">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="registros" class="mb-3">Registros de</label>
                                            <select class="form-control mb-3" name="registros" id="registros">
                                                <option value="">Seleccione</option>
                                                <option value="comentarios">Comentarios</option>
                                                <option value="poligrafos">Polígrafos</option>
                                                <option value="verificaciones">Verificaciones</option>
                                                <option value="vacunas">Vacunas</option>
                                                <option value="capacitaciones">Capacitaciones</option>
                                                <option value="llamadas">Llamadas de Atención</option>
                                                <option value="vacaciones">Vacaciones</option>
                                                <option value="suspensiones">Suspensiones</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">&nbsp;</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">&nbsp;</div>
                                    </div>
                                </div>


                                {{-- Tabla de Comentarios --}}
                                <div id="tablacomentarios" style="display: none">
                                    {{-- <a href="javascript:alert('Módulo en Proceso');" class="btn btn-primary mb-2">Agregar Comentario</a> --}}
                                    
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAddcomments" data-whatever="">Agregar Comentario</button>
                                    <table class="table table-striped text-center" id="tabla">
                                        {{-- <table class="table table-active text-center" id="tabla"> --}}
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Comentario</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-striped">
                                            @if($comment->count())
                                            @for ($i=0;$i<$comment->count();$i++)
                                                <tr>
                                                    <td>{{ date("d/m/Y", strtotime($comment[$i]->date)) }}</td>
                                                    <td>{{ $comment[$i]->comment }}</td>
                                                </tr>
                                            @endfor
                                        @else
                                        <tr>
                                            <td colspan="4">No hay comentarios registrados</td>
                                        </tr>
                                    @endif
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Modal Agregar Comentarios --}}
                                <div class="modal fade" id="modalAddComments" tabindex="-1" role="dialog" aria-labelledby="modalAddcommentsLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modalAddcommentsLabel">Agregar Comentario</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('comments.store')}}" method="POST">
                                              @csrf
                                            <div class="form-group">
                                              <label for="date" class="col-form-label">Fecha:</label>
                                              <input type="date" class="form-control" id="date" name="date">
                                            </div>
                                            <div class="form-group">
                                              <label for="comment" class="col-form-label">Comentario:</label>
                                              <textarea class="form-control" id="comment" name="comment"></textarea>
                                            </div>
                                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                          {{-- </form> --}}
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="3">Cerrar</button>
                                          <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>
                                
                                  {{-- Tabla de Polígrafos --}}
                                <div id="tablapoligrafos" style="display: none">
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAddPoligraphs" data-whatever="">Agregar Polígrafo</button>
                                    <table class="table table-active text-center" id="tabla">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Tipo de Prueba</th>
                                                <th>Resultado</th>
                                                <th>Comentario</th>
                                                <th>Poligrafista</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($poligraph->count())
                                            @for ($i=0;$i<$poligraph->count();$i++)
                                            <tr>
                                                <td>{{ date("d/m/Y", strtotime($poligraph[$i]->date)) }}</td>
                                                <td>{{ $poligraph[$i]->poligraphType->name }}</td>
                                                <td>{{ $poligraph[$i]->result }}</td>
                                                <td>{{ $poligraph[$i]->comment }}</td>
                                                <td>{{ $poligraph[$i]->poligrapher }}</td>
                                            </tr>
                                        @endfor
                                        @else
                                            <tr>
                                                <td colspan="4">No hay polígrafos registrados</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Modal Agregar Polígrafos --}}
                                <div class="modal fade" id="modalAddPoligraphs" tabindex="-1" role="dialog" aria-labelledby="modalAddPoligraphsLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modalAddPoligraphsLabel">Agregar Polígrafo</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('poligraphs.store')}}" method="POST">
                                              @csrf
                                            <div class="form-group">
                                              <label for="date" class="col-form-label">Fecha:</label>
                                              <input type="date" class="form-control" id="date" name="date">
                                            </div>
                                            <div class="form-group">
                                                <label for="poligraphtype" class="col-form-label">Tipo de Prueba:</label>
                                                <select class="form-control" name="poligraphtype" id="poligraphtype">
                                                    <option value="">Seleccione</option>
                                                    @for($i = 0; $i<$poligraphtype->count(); $i++)
                                                        <option value="{{ $poligraphtype[$i]->id }}">{{ $poligraphtype[$i]->name }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="result" class="col-form-label">Resultado:</label>
                                                <input type="text" class="form-control" id="result" name="result">
                                            </div>
                                            <div class="form-group">
                                              <label for="comment" class="col-form-label">Comentario:</label>
                                              <textarea class="form-control" id="comment" name="comment"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="poligrapher" class="col-form-label">Poligrafista:</label>
                                                <input type="text" class="form-control" id="poligrapher" name="poligrapher">
                                            </div>
                                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>

                                {{-- Tabla de Verificaciones --}}
                                <div id="tablaverificaciones" style="display: none">
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAddVerifications" data-whatever="">Agregar Verificación</button>
                                    <table class="table table-active text-center" id="tabla">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Tipo de Verificación</th>
                                                <th>Resultado</th>
                                                <th>Comentario</th>
                                                <th>Verificador</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($verification->count())
                                            @for ($i=0;$i<$verification->count();$i++)
                                                <tr>
                                                    <td>{{ date("d/m/Y", strtotime($verification[$i]->date)) }}</td>
                                                    <td>{{ $verification[$i]->verificationType->name }}</td>
                                                    <td>{{ $verification[$i]->result }}</td>
                                                    <td>{{ $verification[$i]->comment }}</td>
                                                    <td>{{ $verification[$i]->verificator }}</td>
                                                </tr>
                                            @endfor
                                            @else
                                            <tr>
                                                <td colspan="4">No hay verificaciones registradas</td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                
                                {{-- Modal Agregar Verificaciones --}}
                                <div class="modal fade" id="modalAddVerifications" tabindex="-1" role="dialog" aria-labelledby="modalAddVerificationsLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modalAddVerificationsLabel">Agregar Verificación</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('verifications.store')}}" method="POST">
                                              @csrf
                                            <div class="form-group">
                                              <label for="date" class="col-form-label">Fecha:</label>
                                              <input type="date" class="form-control" id="date" name="date">
                                            </div>
                                            <div class="form-group">
                                                <label for="verificationtype" class="col-form-label">Tipo de verificación:</label>
                                                <select class="form-control" name="verificationtype" id="verificationtype">
                                                    <option value="">Seleccione</option>
                                                    @for($i = 0; $i<$verificationtype->count(); $i++)
                                                        <option value="{{ $verificationtype[$i]->id }}">{{ $verificationtype[$i]->name }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="result" class="col-form-label">Resultado:</label>
                                                <input type="text" class="form-control" id="result" name="result">
                                            </div>
                                            <div class="form-group">
                                              <label for="comment" class="col-form-label">Comentario:</label>
                                              <textarea class="form-control" id="comment" name="comment"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="verificator" class="col-form-label">Verificador:</label>
                                                <input type="text" class="form-control" id="verificator" name="verificator">
                                            </div>
                                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>

                                {{-- Tabla de Vacunas --}}
                                <div id="tablavacunas" style="display: none">
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAddVaccines" data-whatever="">Agregar Vacuna</button>
                                    <table class="table table-active text-center" id="tabla">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Dosis</th>
                                                <th>Vacuna</th>
                                                <th>Comentario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($vaccine->count())
                                            @for ($i=0;$i<$vaccine->count();$i++)
                                                <tr>
                                                    <td>{{ date("d/m/Y", strtotime($vaccine[$i]->dosis_date)) }}</td>
                                                    <td>{{ $vaccine[$i]->dosis_number }}</td>
                                                    <td>{{ $vaccine[$i]->dosis_type }}</td>
                                                    <td>
                                                        @if($vaccine[$i]->comment!=null)
                                                            {{ $vaccine[$i]->dosis_comment }}
                                                        @else
                                                            No hay comentarios
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endfor
                                            @else
                                            <tr>
                                                <td colspan="4">No hay vacunas registradas</td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                
                                {{-- Modal Agregar Vacunas --}}
                                <div class="modal fade" id="modalAddVaccines" tabindex="-1" role="dialog" aria-labelledby="modalAddVaccinesLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modalAddVaccinesLabel">Agregar Vacuna</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('vaccines.store')}}" method="POST">
                                              @csrf
                                            <div class="form-group">
                                              <label for="dosis_date" class="col-form-label">Fecha de Aplicación:</label>
                                              <input type="date" class="form-control" id="dosis_date" name="dosis_date">
                                            </div>
                                            <div class="form-group">
                                                <label for="dosis_number" class="col-form-label">Número de Dosis:</label>
                                                <select class="form-control" name="dosis_number" id="dosis_number">
                                                    <option value="">Seleccione</option>
                                                    <option value="Primera">Primera</option>
                                                    <option value="Segunda">Segunda</option>
                                                    <option value="Tercera">Tercera</option>
                                                    <option value="Cuarta">Cuarta</option>
                                                    <option value="Otra">Otra</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="dosis_type" class="col-form-label">Tipo de Vacuna:</label>
                                                <select class="form-control" name="dosis_type" id="dosis_type">
                                                    <option value="">Seleccione</option>
                                                    <option value="Moderna">Moderna</option>
                                                    <option value="Sputnik">Sputnik</option>
                                                    <option value="AstraZeneca">AstraZeneca</option>
                                                    <option value="Pfizer">Pfizer</option>
                                                    <option value="Jhonson">Jhonson</option>
                                                    <option value="Otra">Otra</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="dosis_comment" class="col-form-label">Comentario:</label>
                                                <input type="text" class="form-control" id="dosis_comment" name="dosis_comment">
                                            </div>
                                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>

                                {{-- Tabla de Capacitaciones --}}
                                <div id="tablacapacitaciones" style="display: none">
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAddCapacitations" data-whatever="">Agregar Capacitación</button>
                                    <table class="table table-active text-center" id="tabla">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Tipo de Capacitación</th>
                                                <th>Instructor</th>
                                                <th>Comentario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($capacitation->count())
                                            @for ($i=0;$i<$capacitation->count();$i++)
                                                <tr>
                                                    <td>{{ date("d/m/Y", strtotime($capacitation[$i]->date)) }}</td>
                                                    <td>{{ $capacitation[$i]->capacitationType->name }}</td>
                                                    <td>{{ $capacitation[$i]->instructor }}</td>
                                                    <td>
                                                        @if($capacitation[$i]->comment!=null)
                                                            {{ $capacitation[$i]->comment }}
                                                        @else
                                                            No hay comentarios
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endfor
                                            @else
                                            <tr>
                                                <td colspan="4">No hay capacitaciones registradas</td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                
                                {{-- Modal Agregar Capacitaciones --}}
                                <div class="modal fade" id="modalAddCapacitations" tabindex="-1" role="dialog" aria-labelledby="modalAddCapacitationsLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modalAddCapacitationsLabel">Agregar Capacitación</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('capacitations.store')}}" method="POST">
                                              @csrf
                                            <div class="form-group">
                                              <label for="capacitationDate" class="col-form-label">Fecha:</label>
                                              <input type="date" class="form-control" id="capacitationDate" name="capacitationDate">
                                            </div>
                                            <div class="form-group">
                                                <label for="capacitationType" class="col-form-label">Tipo de capacitación:</label>
                                                <select class="form-control" name="capacitationType" id="capacitationType">
                                                    <option value="">Seleccione</option>
                                                    @for($i = 0; $i<$capacitationType->count(); $i++)
                                                        <option value="{{ $capacitationType[$i]->id }}">{{ $capacitationType[$i]->name }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="instructor" class="col-form-label">Instructor:</label>
                                                <input type="text" class="form-control" id="instructor" name="instructor">
                                            </div>
                                            <div class="form-group">
                                              <label for="capacitationComment" class="col-form-label">Comentario:</label>
                                              <textarea class="form-control" id="capacitationComment" name="capacitationComment"></textarea>
                                            </div>
                                            
                                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>

                                {{-- Tabla de Llamadas de Atención --}}
                                <div id="tablallamadas" style="display: none">
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAddLlamadas" data-whatever="">Agregar Llamada de Atención</button>
                                    <table class="table table-active text-center" id="tabla">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Razón</th>
                                                <th>Comentario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($attentioncall->count())
                                            @for ($i=0;$i<$attentioncall->count();$i++)
                                                <tr>
                                                    <td>{{ date("d/m/Y", strtotime($attentioncall[$i]->date)) }}</td>
                                                    <td>{{ $attentioncall[$i]->reason }}</td>
                                                    <td>
                                                        @if($attentioncall[$i]->comment!=null)
                                                            {{ $attentioncall[$i]->comment }}
                                                        @else
                                                            No hay comentarios
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endfor
                                            @else
                                            <tr>
                                                <td colspan="4">No hay llamadas de atención registradas</td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                
                                {{-- Modal Agregar Llamada de Atención --}}
                                <div class="modal fade" id="modalAddLlamadas" tabindex="-1" role="dialog" aria-labelledby="modalAddLlamadasLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modalAddLlamadasLabel">Agregar Llamada de Atención</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('attentionCalls.store')}}" method="POST">
                                              @csrf
                                            <div class="form-group">
                                              <label for="date" class="col-form-label">Fecha:</label>
                                              <input type="date" class="form-control" id="date" name="date">
                                            </div>
                                            <div class="form-group">
                                                <label for="reason" class="col-form-label">Razón o Motivo:</label>
                                                <input type="text" class="form-control" id="reason" name="reason">
                                              </div>
                                            <div class="form-group">
                                                <label for="comment" class="col-form-label">Comentario:</label>
                                                <input type="text" class="form-control" id="comment" name="comment">
                                            </div>
                                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>

                                {{-- Tabla de Vacaciones --}}
                                <div id="tablavacaciones" style="display: none">
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAddVacaciones" data-whatever="">Agregar Vacaciones</button>
                                    <table class="table table-active text-center" id="tabla">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Periodo</th>
                                                <th>Comentario</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($vacation->count())
                                            @for ($i=0;$i<$vacation->count();$i++)
                                                <tr>
                                                    <td>{{ date("d/m/Y", strtotime($vacation[$i]->date)) }}</td>
                                                    <td>{{ $vacation[$i]->period }}</td>
                                                    <td>
                                                        @if($vacation[$i]->comment!=null)
                                                            {{ $vacation[$i]->comment }}
                                                        @else
                                                            No hay comentarios
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalEditVacaciones" data-whatever="">
                                                            <i class="fa fa-pencil"></i>
                                                        </button> --}}
                                                        <a href="{{ route('vacations.edit', $vacation[$i],$employee) }}" class="btn btn-success">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="{{ route('vacations.destroy', $vacation[$i]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endfor
                                            @else
                                            <tr>
                                                <td colspan="4">No hay periodos vacacionales registrados</td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                
                                {{-- Modal Agregar Vacaciones --}}
                                <div class="modal fade" id="modalAddVacaciones" tabindex="-1" role="dialog" aria-labelledby="modalAddVacaciones" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modalAddVacacionesLabel">Agregar Período vacacional</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('vacations.store')}}" method="POST">
                                              @csrf
                                            <div class="form-group">
                                              <label for="date" class="col-form-label">Fecha:</label>
                                              <input type="date" class="form-control" id="date" name="date">
                                            </div>
                                            <div class="form-group">
                                                <label for="period" class="col-form-label">Período:</label>
                                                <input type="text" class="form-control" id="period" name="period">
                                              </div>
                                            <div class="form-group">
                                                <label for="comment" class="col-form-label">Comentario:</label>
                                                <input type="text" class="form-control" id="comment" name="comment">
                                            </div>
                                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Agregar</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          {{-- <button type="submit" class="btn btn-primary">Agregar</button> --}}
                                        </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>
                                {{-- Fin Tabla de Vacaciones --}}

                                {{-- Tabla de Suspensiones --}}
                                <div id="tablasuspensiones" style="display: none">
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAddSuspensiones" data-whatever="">Agregar Suspensión</button>
                                    <table class="table table-active text-center" id="tabla">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Razón</th>
                                                <th>Comentario</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($suspension->count())
                                            @for ($i=0;$i<$suspension->count();$i++)
                                                <tr>
                                                    <td>{{ date("d/m/Y", strtotime($suspension[$i]->date)) }}</td>
                                                    <td>{{ $suspension[$i]->reason }}</td>
                                                    <td>
                                                        @if($suspension[$i]->comment!=null)
                                                            {{ $suspension[$i]->comment }}
                                                        @else
                                                            No hay comentarios
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('suspensions.edit', $suspension[$i],$employee) }}" class="btn btn-success">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="{{ route('suspensions.destroy', $suspension[$i]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endfor
                                            @else
                                            <tr>
                                                <td colspan="4">No hay suspensiones registradas</td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                
                                {{-- Modal Agregar Suspensiones --}}
                                <div class="modal fade" id="modalAddSuspensiones" tabindex="-1" role="dialog" aria-labelledby="modalAddSuspensiones" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="modalAddSuspensionesLabel">Agregar Suspensión</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="{{route('suspensions.store')}}" method="POST">
                                              @csrf
                                            <div class="form-group">
                                              <label for="date" class="col-form-label">Fecha:</label>
                                              <input type="date" class="form-control" id="date" name="date">
                                            </div>
                                            <div class="form-group">
                                                <label for="period" class="col-form-label">Razón o Motivo:</label>
                                                <input type="text" class="form-control" id="period" name="reason">
                                              </div>
                                            <div class="form-group">
                                                <label for="comment" class="col-form-label">Comentario:</label>
                                                <input type="text" class="form-control" id="comment" name="comment">
                                            </div>
                                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Agregar</button>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                          </form>
                                      </div>
                                    </div>
                                </div>
                                {{-- Fin Modal Agregar Suspensiones --}}
                                {{-- Fin Tabla de Suspensiones --}}
                            </div>
                        </div>
                        {{-- Fin Otros --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script>
        $registros = document.getElementById('registros');
        $registroAnterior = $registros;

        $registros.addEventListener('change', function() {
            mostrarOcultarTablas('tabla' + $registros.value);
            $registros.value = "";

        });

        function mostrarOcultarTablas(id){
            mostrado=0;
            elem = document.getElementById(id);
            if(elem.style.display=="block")mostrado=1;
            elem.style.display="none";
            if(mostrado!=1)elem.style.display="block";
        }
    </script>

@endsection
