@extends('layouts.base')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

@endsection

<div class="container">
    <h1 class="text-center mt-3">RH Admin</h1>
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
                        <div class="col-md-6">
                            <h4>Listado de Empleados</h4>
                            <br>
                            <a href="{{ route('employees.create') }}" class="btn btn-primary mt-2 mb-2">
                                <i class="fa fa-plus"></i>
                                Agregar empleado
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3">
                    @if($employee->count())
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
                    {{-- {{ $civilstatuses->links() }} --}}

                    @else
                    <p>No se encontró ningún registro</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
