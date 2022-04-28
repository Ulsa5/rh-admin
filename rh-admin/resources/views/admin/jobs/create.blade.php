@extends('layouts.base')

<div class="container">
    <h1 class="text-center mt-3">RH Admin</h1>
</div>

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Agregar Puesto</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('jobs.store')}}" method="POST" class="d-inline" id="form-alta">
                        @csrf

                        <div class="form-group row mt-4">
                            <label for="name" class="col-sm-2 col-form-label">Nombre del Puesto:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" rows="4" tabindex="2"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="department" class="col-sm-2 col-form-label">Departamento:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department" id="department" tabindex="3">
                                    <option value="">Seleccione un Departamento</option>
                                    @foreach ($sections as $section)
                                        <option value='{{ $section->id }}''>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a href="{{ route('jobs.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>
                                    <button type="submit" class="btn btn-primary" tabindex="3">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
