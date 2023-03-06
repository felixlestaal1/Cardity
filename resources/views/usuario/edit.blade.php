@extends('adminlte::page')

@section('title', 'Cardity')

@section('content_header')
    <h1>Editar usuarios</h1>
@stop

@section('content')
<form action="/usuarios/{{$usuario->id}}" method= "POST">
    @csrf
    @method('PUT')
<div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$usuario->nombre}}">
</div>
<div class="mb-3">
    <label for="" class="form-label">Apellido</label>
    <input id="apellido" name="apellido" type="TEXT" class="form-control" tabindex="1" value="{{$usuario->apellido}}">
</div>
<div class="mb-3">
    <label for="" class="form-label">Numero de empleado</label>
    <input id="numero_de_empleado" name="numero_de_empleado" type="number" class="form-control" tabindex="1" value="{{$usuario->numero_de_empleado}}">
</div>
<div class="mb-3">
    <label for="" class="form-label">id tarjeta</label>
    <input id="id_tarjeta" name="id_tarjeta" type="number" class="form-control" tabindex="1" value="{{$usuario->id_tarjeta}}">
</div>
<div class="mb-3">
    <label for="" class="form-label">activo/inactivo</label>
    <input id="activo_inactivo" name="activo_inactivo" type="number" class="form-control" tabindex="1" value="{{$usuario->activo_inactivo}}">
</div>
<div class="mb-3">
    <label for="" class="form-label">eliminado</label>
    <input id="eliminado" name="eliminado" type="number" class="form-control" tabindex="1" value="{{$usuario->eliminado}}">
</div>

<a href="/usuarios" class="btn btn-secondary" tabindex="2">Cancelar</a>
<button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop