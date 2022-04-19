@extends('layouts.base')

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
                            <h4>Listado de Estados Civiles</h4>
                        </div>
                        <div class="col-md-6 text-center">
                            <a href="{{ route('civilstatus.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Nuevo Estado Civil
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($civilstatuses->count())
                    <table class="table table-striped table-hover text-center">
                        <thead class="bg-success">
                            <tr class="text-white">
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Commentario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp

                            @foreach($civilstatuses as $civilstatus)
                            <tr>
                                <td>{{$i+=1;}}</td>
                                <td>{{ $civilstatus->name }}</td>
                                <td>{{ $civilstatus->comment }}</td>
                                <td>
                                    <a href="{{ route('civilstatus.edit', $civilstatus) }}" class="btn btn-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('civilstatus.destroy', $civilstatus) }}" method="POST" class="d-inline formulario-eliminar">
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
                    {{ $civilstatuses->links() }}

                    @else
                    <p>No se encontró ningún registro</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
