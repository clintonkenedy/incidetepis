@extends('adminlte::page')

@section('title', 'Oficinas')

@section('content_header')
<center>
    <h1>OFICINAS</h1>
</center>
@stop

@section('content')
    <a href=" {{ route('oficinas.create') }} " class="btn btn-success mb-3">NUEVA OFICINA</a>
    <table id="oficinas" class="table table-striped mt-2">
        <thead>
            <th>NOMBRE DE OFICINA</th>
            <th>CONTRASEÑA</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
        </thead>
        <tbody>
            @foreach ($oficinas as $oficina)
            <tr class="">
                <td> {{$oficina->nombre_oficina}} </td>
                <td> {{$oficina->password}} </td>
                @if ($oficina->estado==="0")
                    <td><span class="badge bg-success" > Activo </span></td>
                @else
                    <td><span class="badge bg-warning" > Inactivo</span></td>
                @endif
                <td>
                    <a href=" {{ route('oficinas.edit', $oficina) }} " class="btn btn-primary">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css" rel="stylesheet"></link>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#oficinas').DataTable();
        });
    </script>
@stop






