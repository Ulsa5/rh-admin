@extends('layouts.base')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

@endsection

<div class="container">
    <h1 class="text-center mt-3">RH Admin</h1>
</div>

@section('content')

@if(Session::has('notice'))
<div class="container">
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('notice') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
</div>
@endif

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Listado de Tipos de Cuenta Bancaria</h4>
                            <br>
                            {{-- <a href="{{ route('acctypes.create') }}" class="btn btn-primary mt-2 mb-2"> --}}
                                <button class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#modalNuevo" >
                                <i class="fa fa-plus"></i>
                                Agregar tipo de cuenta
                                </button>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3">
                    @if($bankAccountTypes->count())
                    <table id="tabla" class="stripe hover order-colum row-border text-center">
                        <thead class="bg-primary">
                            <tr class="text-white">
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp

                            @foreach($bankAccountTypes as $bankAccountType)
                            <tr>
                                <td>{{ $i+=1 }}</td>
                                <td>{{ $bankAccountType->account_type }}</td>
                                <td>
                                <button class="btn btn-success mt-2 mb-2" data-toggle="modal" data-target="#modalEditar" >
                                    {{-- <a href="{{ route('acctypes.edit', $bankAccountType) }}" class="btn btn-success"> --}}
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                        {{-- </a> --}}
                                    <form action="{{ route('acctypes.destroy', $bankAccountType) }}" method="POST" class="d-inline formulario-eliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $civilstatuses->links() }} --}}

                    @else
                    <p>No se encontró ningún registro</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Inicio Modal Nuevo --}}
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="modalNuevoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="modalNuevoLabel">Agregar tipo de cuenta bancaria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{route('acctypes.store')}}" method="POST" class="d-inline" id="form-alta">
                    @csrf
                    <div class="form-group row mt-4 mb-4">
                        <label for="cuenta" class="col-sm-4 col-form-label">Tipo de Cuenta Bancaria:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control focus" name="cuenta" id="cuenta" autofocus tabindex=""></input>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary" tabindex="">Agregar</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--Fin Modal Nuevo --}}

{{-- Inicio Modal Editar --}}
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar tipo de cuenta bancaria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{route('acctypes.update', $bankAccountType)}}" method="POST" class="d-inline" id="form-alta">
                    @csrf
                    @method('PUT')
                    <div class="form-group row mt-4 mb-4">
                        <label for="cuenta" class="col-sm-4 col-form-label">Tipo de Cuenta Bancaria:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control focus" name="cuenta" id="cuenta" autofocus tabindex="" value="{{ $bankAccountType->account_type }}"></input>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <div class="row">
                            <div class="form-group row mt-4">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" tabindex="4">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--Fin Modal Editar --}}

@endsection



@section('scripts')

<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> --}}

<script>
    $(function(){
        var input = document.getElementById("cuenta");

        $('#modalNuevo').on('shown.bs.modal', function () {
            $('.focus').focus().select();
        });
        $('#modalEditar').on('shown.bs.modal', function () {
            $('.focus').focus().select();
        });
    });
</script>



<script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            "pageLength": 10,
            // "pagingType": "simple",
            // "pagingType": "numbers",
            "paging": true,
            "info": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            }
        });
    });
</script>

@if (session('eliminar')=='ok')
<script>
    Swal.fire(
        'Eliminado!',
        'Registro eliminado correctamente.',
        'success'
        )
</script>
@elseif (session('alta')=='ok')
<script>
    Swal.fire(
        'Exito!',
        'Registro agreado correctamente.',
        'success'
        )
</script>
@elseif (session('edited')=='ok')
<script>
    Swal.fire(
        'Exito!',
        'Registro editado correctamente.',
        'success'
        )
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
        title: 'Estas seguro?',
        text: "Esta acción no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar registro!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.isConfirmed) {

        this.submit();
        }
        })
    });
</script>

@endsection
