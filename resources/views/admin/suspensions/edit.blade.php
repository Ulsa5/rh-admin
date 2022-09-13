@extends('adminlte::page')

@section('title', 'RH Admin')

@section('content_header')
<div class="container">
    <h1 class="text-center mt-3">RH Admin</h1>
</div>
@stop

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Editar Suspensión</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('suspensions.update', $suspension)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mt-4">
                            <label for="date" class="col-sm-2 col-form-label">Fecha:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date" id="date" autofocus tabindex="1" value="{{ $suspension->date }}"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="reason" class="col-sm-2 col-form-label">Razón o Motivo:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="reason" id="reason" tabindex="2" value="{{$suspension->reason}}"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="comment" class="col-sm-2 col-form-label">Comentario:</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" name="comment" id="comment" rows="3" tabindex="3">{{$suspension->comment}}</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="employee_id" id="employee_id" value="{{ $suspension->employee_id }}">

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="row-sm-6">
                                    <a href="{{ route('employees.show',$suspension->employee_id) }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
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

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
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
@stop