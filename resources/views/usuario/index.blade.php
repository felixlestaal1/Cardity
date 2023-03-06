@extends('adminlte::page')

@section('title', 'Cardity')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    
<a href="usuarios/create" class="btn btn-primary">Crear</a>
<table id="usuario"class="table table-dark table-striped mt-4">
    <br></br>
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Numero de empleado</th>
            <th scope="col">Id tarjeta</th>
            <th scope="col">activo/inactivo</th>
            <th scope="col">Eliminado</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Editar</th>


        </tr>
    </thead>
    <tbody>
        @foreach ( $usuarios as $usuario )
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->apellido}}</td>
            <td>{{$usuario->numero_de_empleado}}</td>
            <td>{{$usuario->id_tarjeta}}</td>
            <td>{{$usuario->activo_inactivo}}</td>
            <td>{{$usuario->eliminado}}</td>
            <td>
            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @if ($usuario->eliminado == 0)
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    @else
                        <button type="submit" class="btn btn-success">Activar</button>
                    @endif
                </form>
            </td>
            <td>
               <a href="/usuarios/{{$usuario->id}}/edit" class= "btn btn-info">Editar</a>
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
    $('#usuario').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop