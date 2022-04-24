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
                            <h4>Editar Información del Proyecto</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('projects.update', $project)}}" method="POST">
                        @method('PUT')
                        @csrf
                        
                        <div class="form-group row mt-4">
                            <label for="code" class="col-sm-2 col-form-label">Codigo del Proyecto:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="code" id="code" autofocus tabindex="1" value="{{$project->code}}"></input>
                            </div>
                        </div>
                        
                        <div class="form-group row mt-4">
                            <label for="name" class="col-sm-2 col-form-label">Nombre del Proyecto:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" autofocus tabindex="2" value="{{$project->name}}"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="address" class="col-sm-2 col-form-label">Dirección del Proyecto:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" id="address" autofocus tabindex="2" value="{{$project->address}}"></input>
                            </div>
                        </div>
                        
                        <div class="form-group row mt-4">
                            <label for="projecttype" class="col-sm-2 col-form-label">Tipo de Proyecto:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="projecttype" id="projecttype" tabindex="3">
                                    <option value="{{ $project->projecttype->id }}">{{ $project->projecttype->name }}</option>
                                    @foreach ($projecttypes as $projecttype)
                                        <option value='{{ $projecttype->id }}''>{{ $projecttype->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group row mt-4">
                            <div class="col-sm-10">
                                <a href="{{ route('projects.create') }}" class="btn btn-primary" tabindex="4">Agregar Tipo de Proyecto</a>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a href="{{ route('projects.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>
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
        var code = document.getElementById("code");
        var nombre = document.getElementById("name");
        var address = document.getElementById("address");
        var selectedInput = null;

        window.onload = (event)=>{
            code.select();
        };

        $(function(){
            $('#code').on('focus', function(){
                selectedInput = this;
            }).blur(function(){
                selectedInput = null;
                nombre.select();
            });
        })
    </script>
@endsection