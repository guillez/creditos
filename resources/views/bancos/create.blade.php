@extends('layouts.dashboard')
@section('page_heading','Nuevo Banco')

@section('content')
{{ Form::open([
        'route' => 'bancos.store',
        ]) }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    {{ Form::label('nombre', 'Nombre del Banco:', ['class' => 'control-label']) }}
    {{ Form::text('nombre', null,['class' => 'form-control']) }}
</div>

{{ Form::submit('Crear nuevo banco', ['class' => 'btn btn-primary']) }}

{{ Form::close() }}

@endsection