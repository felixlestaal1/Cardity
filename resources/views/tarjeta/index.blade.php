@extends('adminlte::page')

@section('title', 'Cardity')

@section('content_header')
    <h1>Tarjetas</h1>
@stop

@section('content')
<a href="tarjetas/create" class="btn btn-primary">Crear</a>
<table id="tarjeta"class="table table-dark table-striped mt-4">
    <br></br>
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Id_usuario</th>
            <th scope="col">Id_areas</th>
            <th scope="col">Activo/inactivo</th>
            <th scope="col">Eliminado</th>
            <th scope="col">Eliminar</th>

        </tr>
    </thead>
    <tbody>
        @foreach ( $tarjetas as $tarjeta )  
        <tr>
            <td>{{$tarjeta->id}}</td>
            <td>{{$tarjeta->id_usuario}}</td>
            <td>{{$tarjeta->id_areas}}</td>
            <td>{{ $tarjeta->activo . '' . $tarjeta->inactivo }}</td>
            <td>{{$tarjeta->eliminado}}</td>

            <td>
                <form action="{{ route('tarjetas.destroy', $tarjeta->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @if ($tarjeta->eliminado == 0)
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    @else
                        <button type="submit" class="btn btn-success">Activar</button>
                    @endif
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#tarjeta').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>
@stop