@extends('layouts.dashboard')
@section('page_heading','Editar Banco')

@section('content')
{!! Form::model($banco, [
        'method' => 'PATCH',
        'route' => ['bancos.update', $banco->id],
        ]) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    {!! Form::label('nombre', 'Nombre del Banco:', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', null,['class' => 'form-control']) !!}
</div>

{!! Form::submit('Actualizar banco', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection