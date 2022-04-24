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
                            <h4>Agregar Tipo de Sangre</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('bloods.store')}}" method="POST" class="d-inline" id="form-alta">
                        @csrf
                        <div class="form-group row mt-4">
                            <label for="blood" class="col-sm-2 col-form-label">Tipo de Sangre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="blood" id="blood" autofocus tabindex="1"></input>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="comentario" class="col-sm-2 col-form-label">Comentario:</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" name="comentario" id="comentario" rows="4" tabindex="2"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a href="{{ route('bloods.index') }}" class="btn btn-secondary" tabindex="4">Cancelar</a>
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
