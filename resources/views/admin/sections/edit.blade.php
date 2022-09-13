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
                            <h4>Editar Datos del Departamento</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('sections.update', $section)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mt-4">
                            <label for="seccion" class="col-sm-2 col-form-label">Nombre del Departamento:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="seccion" id="seccion" autofocus tabindex="1" value="{{$section->name}}"></input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a href="{{ route('sections.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>
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
        var input = document.getElementById("seccion");
        window.onload = (event)=>{
            input.select();
        };
    </script>
@endsection