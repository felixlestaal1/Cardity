@extends('adminlte::page')

@section('title', 'Cardity')

@section('content_header')
    <h1>Editor de areas</h1>
@stop

@section('content')
<form action="/areas/{{$area->id}}" method= "POST">
    @csrf
    @method('PUT')
<div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$area->nombre}}">
</div>
<div class="mb-3">
    <label for="" class="form-label">Eliminado</label>
    <input id="eliminado" name="eliminado" type="number" class="form-control" tabindex="1" value="{{$area->eliminado}}">
</div>

<a href="/areas" class="btn btn-secondary" tabindex="2">Cancelar</a>
<button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop