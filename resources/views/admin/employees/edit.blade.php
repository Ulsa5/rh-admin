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
                            <h4>Editar Información del Departamento</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('municipalities.update', $municipality)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mt-4">
                            <label for="code" class="col-sm-2 col-form-label">Código del Municipio:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="code" id="code" autofocus tabindex="1" value="{{$municipality->code}}"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="name" class="col-sm-2 col-form-label">Nombre del Municipio:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" rows="4" tabindex="2" value="{{$municipality->name}}"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="department" class="col-sm-2 col-form-label">Departamento:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department" id="department" tabindex="3">
                                    <option value="{{ $municipality->department->id }}">{{ $municipality->department->name }}</option>
                                    @foreach ($departments as $department)
                                        <option value='{{ $department->id }}''>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a href="{{ route('municipalities.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>
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
        var department = document.getElementById("department");
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