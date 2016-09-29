@extends('layouts.dashboard')
@section('page_heading','Nueva Clasificación de Cuenta')

@section('content')
{{ Form::open([
        'route' => 'clasificacioncuentas.store',
        ]) }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    {{ Form::label('descripcion', 'Clasificación de la Cuenta:', ['class' => 'control-label']) }}
    {{ Form::text('descripcion', null,['class' => 'form-control']) }}
</div>

{{ Form::submit('Crear Clasificación', ['class' => 'btn btn-primary']) }}

{{ Form::close() }}

@endsection