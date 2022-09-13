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
                            <h4>Editar Información de la filial</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('igssafilliations.update', $igssafilliation)}}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group row mt-4">
                            <label for="number" class="col-sm-2 col-form-label">Número de Afiliación:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="number" id="number" rows="4" tabindex="2" value="{{$igssafilliation->number}}"></input>
                            </div>
                        </div>
                        
                        <div class="form-group row mt-4">
                            <label for="filial" class="col-sm-2 col-form-label">Número de Filial:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="filial" id="filial" rows="4" tabindex="2" value="{{$igssafilliation->filial}}"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="company" class="col-sm-2 col-form-label">Empresa:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="company" id="company" tabindex="3">
                                    <option value="{{ $igssafilliation->company->id }}">{{ $igssafilliation->company->name }} (seleccionado)</option>
                                    @foreach ($companies as $company)
                                        <option value='{{ $company->id }}'>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a href="{{ route('igssafilliations.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>
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
        var number = document.getElementById("number");
        var filial = document.getElementById("filial");
        var selectedInput = null;

        window.onload = (event)=>{
            number.select();
        };

        $(function(){
            $('#number').on('focus', function(){
                selectedInput = this;
            }).blur(function(){
                selectedInput = null;
                filial.select();
            });
        })
    </script>
@endsection