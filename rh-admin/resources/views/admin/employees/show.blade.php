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
                            <h4>Ficha del Empleado</h4>
                        </div>
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
                            
                        </div>

                        {{-- Documentos y Afiliaciones --}}
                        <div class="tab-pane fade" id="nav-documentos" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <h3>Documentos</h3>
                            
                        </div>

                        {{-- Comentarios, etc. --}}
                        <div class="tab-pane fade" id="nav-otros" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <h3>Otros</h3>
                            
                        </div>

                      </div>
                      










                    {{-- @if($employee->count())
                    <table id="tabla" class="stripe hover order-colum row-border text-center nowrap">
                        <thead class="bg-primary">
                            <tr class="text-white">
                                <th>No.</th>
                                <th>Foto</th>
                                <th>Fecha de Alta</th>
                                <th>Nombre</th>
                                <th>Empresa</th>
                                <th>DPI</th>
                                <th>Extendido en</th>
                                <th>Fecha Nacimiento</th>
                                <th>Lugar Nacimiento</th>
                                <th>Puesto</th>
                                <th>Proyecto</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp

                            <tr>
                                <td>
                                    {{ $i+=1 }}
                                </td>
                                <td>
                                    <a href="{{ route('employees.show', $employee) }}">
                                        <img src="{{ asset('img/perfil.jpg') }}"</img>
                                    </a>
                                </td>
                                <td>
                                    {{ date("d-m-Y", strtotime($employee->admission_date)) }}
                                </td>
                                <td>
                                    <a href="{{ route('employees.show', $employee) }}">
                                        {{ $employee->name }}
                                    </a>
                                </td>
                                <td>{{ $employee->company->name }}</td>
                                <td>{{ $employee->dpi }}</td>
                                <td>{{ $employee->municipality->name.", ".$employee->municipality->department->name }}</td>
                                <td>{{ date("d-m-Y", strtotime($employee->birthday)) }}</td>
                                <td>{{ $employee->municipality->name.", ".$employee->municipality->department->name }}</td>
                                <td>{{ $employee->job->name }}</td>
                                <td>{{ $employee->project->name }}</td>
                                <td>{{ $employee->telephone }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-success">
                                        <i class="fa-solid fa-user-pen" title="Editar"></i>
                                    </a>
                                    <a href="{{ route('employees.show', $employee) }}" class="btn btn-warning">
                                        <i class="fa fa-user-check" title="Ver ficha"></i>
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline formulario-eliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-user-xmark" title="Dar Baja"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{ $civilstatuses->links() }} --}}

                    {{-- @else
                    <p>No se encontró ningún registro</p>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
