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
                            <h4>Editar Información del Puesto</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('jobs.update', $job)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mt-4">
                            <label for="name" class="col-sm-2 col-form-label">Nombre del Puesto:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" autofocus tabindex="1" value="{{$job->name}}"></input>
                            </div>
                        </div>
                        
                        <div class="form-group row mt-4">
                            <label for="department" class="col-sm-2 col-form-label">Departamento:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department" id="department" tabindex="3">
                                    <option value="{{ $job->section->id }}">{{ $job->section->name }}</option>
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
                                    <button type="submit" class="btn btn-primary" tabindex="3">Actualizar</button>
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

@section('scripts')
    <script>
        var nombre = document.getElementById("name");
        var department = document.getElementById("department");
        var selectedInput = null;

        window.onload = (event)=>{
            nombre.select();
        };

        $(function(){
            $('#name').on('focus', function(){
                selectedInput = this;
            }).blur(function(){
                selectedInput = null;
                nombre.select();
            });
        })
    </script>
@endsection