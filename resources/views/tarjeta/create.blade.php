@extends('adminlte::page')

@section('title', 'Cardity')

@section('content_header')
    <h1>Registro de tarjetas</h1>
@stop

@section('content')
<form action="/tarjetas" method= "POST">
    @csrf

<div class="mb-3">
    <label for="" class="form-label">Id usuario</label>
    <input id="id_usuario" name="id_usuario" type="text" class="form-control" tabindex="1">
</div>
<div class="mb-3">
    <label for="" class="form-label">Id areas</label>
    <input id="id_areas" name="id_areas" type="number" class="form-control" tabindex="1">
</div>
<div class="mb-3">
    <label for="" class="form-label">Eliminado</label>
    <input id="eliminado" name="eliminado" type="number" class="form-control" tabindex="1">
</div>

<a href="/tarjetas" class="btn btn-secondary" tabindex="2">Cancelar</a>
<button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop