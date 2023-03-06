@extends('adminlte::page')

@section('title', 'Cardity')

@section('content_header')
    <h1>Areas</h1>
@stop

@section('content')
<a href="areas/create" class="btn btn-primary">Crear</a>
<table id="area" class="table table-dark table-striped mt-4">
    <br><br>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Eliminado</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Editar</th>


        </tr>
    </thead>
    <tbody>
        @foreach ( $areas as $area )
        <tr>
            <td>{{$area->id}}</td>
            <td>{{$area->nombre}}</td>
            <td>{{$area->eliminado}}</td>

            <td>
            <form action="{{ route('areas.destroy', $area->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @if ($area->eliminado == 0)
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    @else
                        <button type="submit" class="btn btn-success">Activar</button>
                    @endif
                </form>
            </td>
            <td>
               <a href="/areas/{{$area->id}}/edit" class= "btn btn-info">Editar</a>
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
    $('#area').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>
@stop