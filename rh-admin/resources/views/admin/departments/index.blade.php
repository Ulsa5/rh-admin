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
                            <h4>Listado de Departamentos</h4>
                            <br>
                            <a href="{{ route('departments.create') }}" class="btn btn-primary mt-2 mb-2">
                                <i class="fa fa-plus"></i>
                                Agregar departamento
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3">
                    @if($departments->count())
                    <table id="tabla" class="stripe hover order-colum row-border text-center">
                        <thead class="bg-primary">
                            <tr class="text-white">
                                <th>No.</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp

                            @foreach($departments as $department)
                            <tr>
                                <td>{{ $i+=1 }}</td>
                                <td>{{ $department->code }}</td>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <a href="{{ route('departments.edit', $department) }}" class="btn btn-success">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline formulario-eliminar">
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
@endsection

@section('scripts')

<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- DataTables --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> --}}

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
