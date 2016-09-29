@extends('layouts.dashboard')
@section('page_heading','Clasificacion de Cuentas')

@section('content')

<table class="table table-hover " id="clasificacioncuentas-table">
    <thead>
        <th>Descripción</th>
        <th>Acciones</th>
    </thead>
</table>
@stop

@push('scripts')
<script>
$(function() {
    $('#clasificacioncuentas-table').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        ajax: '{!! route('clasificacioncuentas.data') !!}',
        columns: [
            { data: 'namelink', name: 'descripcion' },
            { data: 'action', name: 'action', orderable: false, searchable: false},            
        ]
    });
});
</script>
@endpush