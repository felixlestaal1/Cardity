@extends('adminlte::page')

@section('title', 'Cardity')

@section('content_header')
    <h1>Accesos</h1>
@stop

@section('content')
<a href="accesos/create" class="btn btn-primary">Crear</a>
<table id="accesos" class="table table-dark table-striped mt-4" style="width:100%">
<br></br>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Id_usuario</th>
            <th scope="col">Id_tarjeta</th>
            <th scope="col">id_areas</th>
            

        </tr>
    </thead>
    <tbody>
        @foreach ( $registroDeAccesos as $registroDeAcceso )
        <tr>
            <td>{{$registroDeAcceso->id}}</td>
            <td>{{$registroDeAcceso->id_usuario}}</td>
            <td>{{$registroDeAcceso->id_tarjeta}}</td>
            <td>{{$registroDeAcceso->id_areas}}</td>

          
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
    $('#accesos').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>
@stop