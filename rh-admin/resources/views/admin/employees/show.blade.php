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

                        {{-- Documentos y Afiliaciones --}}
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

                        {{-- Comentarios, etc. --}}
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
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
                                
                            </div>
                            
                        </div>

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
