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
                            <h4>Editar Información de la empresa</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('companies.update', $company)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mt-4">
                            <label for="name" class="col-sm-2 col-form-label">Nombre de la Empresa:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" autofocus tabindex="1" value="{{$company->name}}"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="nit" class="col-sm-2 col-form-label">Número de NIT:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nit" id="nit" rows="4" tabindex="2" value="{{$company->nit}}"></input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a href="{{ route('companies.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>
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
        var input = document.getElementById("name");
        var nit = document.getElementById("nit");
        var selectedInput = null;

        window.onload = (event)=>{
            input.select();
        };

        $(function(){
            $('#name').on('focus', function(){
                selectedInput = this;
            }).blur(function(){
                selectedInput = null;
                nit.select();
            });
        })
    </script>
@endsection