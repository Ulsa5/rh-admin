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
                            <h4>Editar Periodo vacacional</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('vacations.update', $vacation)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mt-4">
                            <label for="date" class="col-sm-2 col-form-label">Fecha:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date" id="date" autofocus tabindex="1" value="{{ $vacation->date }}"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="period" class="col-sm-2 col-form-label">Periodo:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="period" id="period" rows="4" tabindex="2" value="{{$vacation->period}}"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="comment" class="col-sm-2 col-form-label">Comentario:</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" name="comment" id="comment" rows="3" tabindex="3">{{$vacation->comment}}</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="employee_id" id="employee_id" value="{{ $vacation->employee_id }}">

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a href="{{ route('employees.show',$vacation->employee_id) }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
                                    <button type="submit" class="btn btn-primary" tabindex="4">Actualizar</button>
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
        var codigo = document.getElementById("code");
        var nombre = document.getElementById("name");
        var selectedInput = null;

        window.onload = (event)=>{
            codigo.select();
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