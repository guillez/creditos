@extends('layouts.dashboard')
@section('page_heading','Editar Clasificación de Cuenta')

@section('content')
{!! Form::model($clasificacioncuenta, [
        'method' => 'PATCH',
        'route' => ['clasificacioncuentas.update', $clasificacioncuenta->id],
        ]) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    {!! Form::label('descripcion', 'Clasificación de la Cuenta:', ['class' => 'control-label']) !!}
    {!! Form::text('descripcion', null,['class' => 'form-control']) !!}
</div>

{!! Form::submit('Actualizar Clasificación', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection