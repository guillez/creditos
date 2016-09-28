@extends('layouts.dashboard')
@section('page_heading','Bancos')

@section('content')

<table class="table table-hover " id="bancos-table">
    <thead>
        <th>Nombre</th>
        <th>Acciones</th>
    </thead>
</table>
@stop

@push('scripts')
<script>
$(function() {
    $('#bancos-table').DataTable({
        processing: true,
        serverSide: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/Spanish.json"
        },
        ajax: '{!! route('bancos.data') !!}',
        columns: [
            { data: 'namelink', name: 'nombre' },
            { data: 'action', name: 'action', orderable: false, searchable: false},            
        ]
    });
});
</script>
@endpush