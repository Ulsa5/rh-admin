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
                            <h4>Agregar Género</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('gender.store')}}" method="POST" class="d-inline" id="form-alta">
                        @csrf
                        <div class="form-group row mt-4">
                            <label for="genero" class="col-sm-2 col-form-label">Género:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="genero" id="genero" autofocus tabindex="1"></input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a href="{{ route('gender.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>
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
